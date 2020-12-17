<?php

require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');
require('model/answers_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login': {
        //displays login page on screen
        if($_SESSION['userId']){
            header('Location: .?action=display_users');
        }else {
            include('views/login.php');
        }
        break;
    }

    case 'validate_login': {
        //checks for valid login info
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($email == NULL || $password == NULL) {
            $error = 'Email and Password are not included';
            include('errors/error.php');
        } else {
            $userId = AccountDB::validate_login($email, $password);
            echo "User ID IS: $userId";
            if ($userId == false) {
                header("Location: .?action=display_registration");
            } else {
                $_SESSION['userId'] = $userId;
                header("Location: .?action=display_questions");
            }
        }
        break;
    }

    case 'display_registration': {
        //gets the registration form on screen
        include('views/registration.php');
        break;
    }

    case 'register_form': {
        //registers a new user
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($fname == NULL || $lname == NULL || $birthday == NULL || $email == NULL || $password == NULL) {
            $error = 'All fields are required';
            include('errors/error.php');
            header('Location: .?action=display_registration');
        } else {
            AccountDB::create_new_user($fname, $lname, $birthday, $email, $password);
            header("Location: .?action=show_login");
        }
        break;
    }

    case 'display_questions': {
        //displays questions on screen for the user
        $userId = $_SESSION['userId']; //filter_input(INPUT_GET, 'userId');
        $listType = filter_input(INPUT_GET, 'listType');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            $questions = ($listType === 'all') ?
                QuestionDB::get_all_questions() : QuestionDB::get_users_questions($userId);
            include('views/display_questions.php');
        }
        break;
    }

    case 'display_question_form': {
        //displays question form on screen
        $userId = $_SESSION['userId']; //filter_input(INPUT_GET, 'userId');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            include('views/question_form.php');
        }
        break;
    }

   case 'display_users': {
        //gets the user that is logged in
        $userId = $_SESSION['userId']; //filter_input(INPUT_GET, 'userId');
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            include('errors/error.php');
        } else {
            $questions = QuestionDB::get_users_questions($userId);
            include('views/display_questions.php');
        }
        break;
    }
    case 'display_edit_question': {
        //display the edit question form
        $userId = $_SESSION['userId']; //filter_input(INPUT_POST, 'userId');
        $questionId = filter_input(INPUT_POST, 'questionId');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            $question = QuestionDB::get_question($questionId);
            include('views/edit_question_form.php');
        }
        break;
    }
    case 'edit_question': {
        //able to edit a question right from the website
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = $_SESSION['userId']; //filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');

        if ($questionId == NULL || $userId == NULL){
            $error = "All fields are required";
            include('errors/error.php');
        } else {
           QuestionDB::edit_question($questionId, $title, $body, $skills);
           header("Location: .?action=display_questions");
        }
        break;
    }

    case 'delete_question': {
        //able to delete a question from the website
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = $_SESSION['userId']; //filter_input(INPUT_POST, 'userId');
        if ($questionId == NULL || $userId == NULL){
            $error = "All fields are required";
            include('errors/error.php');
        } else {
            QuestionDB::delete_question($questionId);
            header("Location: .?action=display_questions");
        }
    }

    case 'submit_question': {
        //submitting a question form
        $userId = $_SESSION['userId']; //filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');

        if ($userId == NULL || $title == NULL || $body == NULL || $skills == NULL) {
            $error = 'All fields are required';
            include('errors/error.php');
        } else {
            QuestionDB::create_question($title, $body, $skills, $userId);
            header("Location: .?action=display_questions");
        }

        break;
    }
    case 'display_single_question': {
        $userId = $_SESSION['userId']; //filter_input(INPUT_GET, 'userId');
        $questionId = filter_input(INPUT_GET, 'questionId');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            $question = QuestionDB::get_question($questionId);
            include('views/single_question_view.php');
        }
        break;
    }
    case 'logout': {
        session_destroy();
        $_SESSION = array();

        $name = session_name();
        $expire = strtotime('-1 year');

        $params = session_get_cookie_params();

        setcookie($name, '', $expire, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

        header('Location: .');
        break;
    }
    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}

?>
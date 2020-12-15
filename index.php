<?php

require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');
require('model/answers_db.php');

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
        include('views/login.php');
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
            $userId = AccountsDB::validate_login($email, $password);
            echo "User ID IS: $userId";
            if ($userId == false) {
                header("Location: .?action=display_registration");
            } else {
                header("Location: .?action=display_questions&userId=$userId");
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
            AccountsDB::create_new_user($fname, $lname, $birthday, $email, $password);
            header("Location: .?action=show_login");
        }
        break;
    }

    case 'display_questions': {
        //displays questions on screen for the user
        $userId = filter_input(INPUT_GET, 'userId');
        $listType = filter_input(INPUT_GET, 'listType');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            $questions = ($listType === 'all') ?
                QuestionsDB::get_all_questions() : QuestionsDB::get_users_questions($userId);
            include('views/display_questions.php');
        }
        break;
    }

    case 'display_question_form': {
        //displays question form on screen
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            include('views/question_form.php');
        }
        break;
    }

   case 'display_users': {
        //gets the user that is logged in
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            include('errors/error.php');
        } else {
            $questions = QuestionsDB::get_users_questions($userId);
            include('views/display_questions.php');
        }
        break;
    }
    case 'display_edit_question': {
        //display the edit question form
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            include('views/edit_question_form.php');
        }
        break;
    }
    case 'edit_question': {
        //able to edit a question right from the website
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');

        if ($questionId == NULL || $userId == NULL){
            $error = "All fields are required";
            include('errors/error.php');
        } else {
           QuestionsDB::edit_question($questionId, $title, $body, $skills);
           header("Location: .?action=display_edit_question&userId=$userId");
           //header("Location: .?action=display_questions&userId=$userId");
        }
        break;
    }

    case 'delete_question': {
        //able to delete a question from the website
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        if ($questionId == NULL || $userId == NULL){
            $error = "All fields are required";
            include('errors/error.php');
        } else {
            QuestionsDB::delete_question($questionId);
            header("Location: .?action=display_questions&userId=$userId");
        }
    }

    case 'submit_question': {
        //submitting a question form
        $userId = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');

        if ($userId == NULL || $title == NULL || $body == NULL || $skills == NULL) {
            $error = 'All fields are required';
            include('errors/error.php');
        } else {
            QuestionsDB::create_question($title, $body, $skills, $userId);
            header("Location: .?action=display_questions&userId=$userId");
        }

        break;
    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}

?>
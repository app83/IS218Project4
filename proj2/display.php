<?php
require('database.php');
require('functions.php');

$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$birthday = filter_input(INPUT_POST, 'birthday');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$userId = filter_input(INPUT_GET, 'userId');
/*
 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login': {
        include('index.php');
        break;
    }

    case 'validate_login': {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($email == NULL || $password == NULL) {
            $error = 'Email and Password are required';
            include('errors/error.php');
        } else {
            $userId = validate_login($email, $password);
            if ($userId !== false) {
                header("Location: .?action=display_users&userId=$userId");
            } else {
                $error = 'Invalid Login';
                include('errors/error.php');
            }
        }
        break;
    }

    case 'display_users': {
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            include('errors/error.php');
        } else {
            $questions = get_questions_by_ownerId($userId);
            include('views/display_questions.php');
        }
        break;
    }
    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}
 */
?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="output.css">

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 20px;
        }
        table {
            width: 75%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>

</head>
<body>

<h2>Questions Added by the User:</h2>
<h2><?php echo "Welcome" .''. $fname . '' . $lname . "!";?></h2>

<!--<a href="Location: display_questions&userId=<?php echo $userId; ?>">Add Question</a>-->

<?php get_question($userId); ?>

<table class="table">
    <tr>
        <th>Title</th>
        <th>Body</th>
        <th>Skills</th>
    </tr>
    <?php foreach ($questions as $question) : ?>
        <tr>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
            <td><?php echo $question['skills']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br><br>
<a href="question.html" class="question">Add a New Question</a>
</body>
</html>

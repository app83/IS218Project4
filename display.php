<?php
require('database.php');
require('functions.php');

$fname = filter_input(INPUT_GET, 'fname');
$lname = filter_input(INPUT_GET, 'lname');
$birthday = filter_input(INPUT_POST, 'birthday');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

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
        }
    </style>

</head>
<body>

<h2>Questions Added by the User:</h2>
<h2><?php echo "Welcome" .''. $fname . '' . $lname . "!";?></h2>

<table class="table" align="center">
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
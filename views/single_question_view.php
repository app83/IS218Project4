<?php
session_start();
include('abstract-views/header.php');
?>

<h2>Displaying Question</h2>
<h4>For User ID #: <?php echo $userId; ?></h4><br>

<h5>User Information:</h5>
<table class="table table-bordered table-sm" >
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthday</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <tr>
        <td><?php echo $user['fname']; ?></td>
        <td><?php echo $user['lname']; ?></td>
        <td><?php echo $user['birthday']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['password']; ?></td>
    </tr>
</table>

<h5>Question Information:</h5>
<table class="table table-bordered table-sm" >
    <tr>
        <th>Title</th>
        <th>Body</th>
        <th>Skills</th>
    </tr>
    <tr>
        <td><?php echo $question['title']; ?></td>
        <td><?php echo $question['body']; ?></td>
        <td><?php echo $question['skills']; ?></td>
    </tr>

</table>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="logout">
    <button class="btn btn-success" value="Logout">Logout</button>

</form>
<?php include('abstract-views/footer.php'); ?>

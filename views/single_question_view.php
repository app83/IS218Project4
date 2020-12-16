<?php
session_start();
include('abstract-views/header.php');
?>

<h2>Displaying Question</h2>
<h4>For User ID #: <?php echo $userId; ?></h4><br>

<table class="table table-bordered table-sm" >
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

<form action="index.php" method="post">
    <input type="hidden" name="action" value="logout">
    <button class="btn btn-success" value="Logout">Logout</button>

</form>
<?php include('abstract-views/footer.php'); ?>

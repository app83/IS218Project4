<?php include('abstract-views/header.php'); ?>

    <a href=".?action=display_question_form&userId=<?php echo $userId ?>">Add Questions</a>

    <h2>Questions for User with ID: <?php echo $userId; ?></h2>

    <table class="table">
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th>Skills</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($questions as $question) : ?>
            <tr>
                <td><?php echo $question['title']; ?></td>
                <td><?php echo $question['body']; ?></td>
                <td><?php echo $question['skills']; ?></td>
                <td><button id="edit_question">Edit</button></td>
                <td><button id="delete_question"> Delete<i class="fa fa-trash"></i></button></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php include('abstract-views/footer.php'); ?>
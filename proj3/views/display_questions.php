<?php include('abstract-views/header.php'); ?>

    <div class="row">
        <div class="col-sm-4"><a href=".?action=display_question_form&userId=<?php echo $userId ?>" class="btn btn-info">Add Questions</a></div>
        <div class="col-sm-4"><a href=".?action=display_questions&userId=<?php echo $userId; ?>&listType=mine" class="btn btn-info">My Questions</a></div>
        <div class="col-sm-4"><a href=".?action=display_questions&userId=<?php echo $userId; ?>&listType=all" class="btn btn-info">All Questions</a></div>
    </div>

    <br><h2>Questions for User ID #: <?php echo $userId; ?></h2>

    <table class="table table-bordered table-sm" >
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
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="edit_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">

                        <button value="Edit"><i class='fas fa-edit' style="color:green;"></i></button>
                    </form>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">

                        <button value="Delete"><i class='fas fa-trash' style="color:firebrick;"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php include('abstract-views/footer.php'); ?>
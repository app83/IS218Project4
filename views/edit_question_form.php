<?php include('abstract-views/header.php'); ?>

    <h2>Edit Question Form</h2>

    <form action="index.php" method="POST" class="regularForm">
        <input type="hidden" name="action" value="edit_question">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <input type="hidden" name="questionId" value ="questionId">

        <div class="row">
            <div class="form-group col-md-4">
                <label for="title">Question Name:</label>
                <input class="form-control" type=text name="title" id="title">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="body">Question Body: </label>
                <input class="form-control" type=text name="body" id="body">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="skills">Question Skills: </label>
                <input class="form-control" type=text name="skills" id="skills">
            </div>
        </div>

        <input class="btn btn-success" type=submit value="Edit Question">
    </form>

<?php include('abstract-views/footer.php'); ?>
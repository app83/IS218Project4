<?php include('abstract-views/header.php'); ?>

    <h2>New Question Form</h2>

    <form action="../index.php" method="POST">
        <input type="hidden" name="action" value="question_form">
        <input type="hidden" name="userId" value ="userId">
        <input type="hidden" name="questionId" value ="questionId">

        Question Name: <input type=text name="title" id="title" ><br><br>
        Question Body: <input type=text name="body" id="body" ><br><br>
        Question Skills: <input type=text name="skills" id="skills" ><br><br>
        <input type=submit>
    </form>

<?php include('abstract-views/footer.php'); ?>
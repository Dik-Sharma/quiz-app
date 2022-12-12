<?php
session_start();
include "header.php";
include "../connection.php";
if (!isset($_SESSION["admin"])) {
?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>

<?php
}
$id = $_GET["id"];
$id1 = $_GET["id1"];
$question = '';
$optn1 = '';
$optn2 = '';
$optn3 = '';
$optn4 = '';
$answer = '';
$res = mysqli_query($link, "select * from questions where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $question = $row["question"];
    $optn1 = $row["optn1"];
    $optn2 = $row["optn2"];
    $optn3 = $row["optn3"];
    $optn4 = $row["optn4"];
    $answer = $row["answer"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Update question</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="form1" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-lg-12" style="margin-top: 16px;">
                                <div class="card">
                                    <div class="form-group">
                                        <div class="card-header"><strong>Update New Questions with text</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label"> Add Question</label>
                                                <input type="text" name="question" placeholder="Add question" class="form-control" value="<?php echo $question ?>">
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label"> Add Option 1</label>
                                                <input type="text" name="optn1" placeholder="Add Optn1" class="form-control" value="<?php echo $optn1 ?>">
                                                <div class="form-group"><label for="company" class=" form-control-label"> Add Option 2</label>
                                                    <input type="text" name="optn2" placeholder="Add Optn2" class="form-control" value="<?php echo $optn2 ?>">
                                                    <div class="form-group"><label for="company" class=" form-control-label"> Add Option 3</label>
                                                        <input type="text" name="optn3" placeholder="Add Optn3" class="form-control" value="<?php echo $optn3 ?>">
                                                        <div class="form-group"><label for="company" class=" form-control-label"> Add Option 4</label>
                                                            <input type="text" name="optn4" placeholder="Add Optn4" class="form-control" value="<?php echo $optn4 ?>">


                                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label>
                                                                <input type="text" name="answer" placeholder="Add Answer" class="form-control" value="<?php echo $answer ?>">

                                                                <input type="submit" name="submit1" value="Update Question" class="btn btn-success">

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--/.col-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
if (isset($_POST["submit1"])) {
    mysqli_query($link, "update questions set question='$_POST[question]',optn1='$_POST[optn1]',optn2='$_POST[optn2]',optn3='$_POST[optn3]',optn4='$_POST[optn4]',answer='$_POST[answer]' where id=$id");
?>
    <script type="text/javascript">
        window.location = "add_edit_exam_questions.php?id=<?php echo $id1 ?>";
    </script>
<?php
}

?>

<!-- Right Panel -->
<?php
include "footer.php";
?>
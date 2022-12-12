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
                <h1>Edit Question with Images</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="" name="form1" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-lg-12" style="margin-top: 16px;">
                                <div class="card">
                                    <div class="form-group">
                                        <div class="card-header"><strong>Add New Questions with images</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label"> Add Question</label>
                                                <input type="text" required name="fquestion" placeholder="Add question" class="form-control" value="<?php echo $question ?>">
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo $optn1; ?>" height="50" width="50" alt=""><br>
                                                <label for="company" class=" form-control-label"> Add Option 1</label>
                                                <input type="file" required name="foptn1" class="form-control" style="padding-bottom:35px;">
                                                <div class="form-group"><img src="<?php echo $optn2; ?>" height="50" width="50" alt=""><br>
                                                    <label for="company" class=" form-control-label"> Add Option 2</label>
                                                    <input type="file" required name="foptn2" class="form-control" style="padding-bottom:35px;">
                                                    <div class="form-group"><img src="<?php echo $optn3; ?>" height="50" width="50" alt=""><br>
                                                        <label for="company" class=" form-control-label"> Add Option 3</label>
                                                        <input type="file" required name="foptn3" class="form-control" style="padding-bottom:35px;">
                                                        <div class="form-group"><img src="<?php echo $optn4; ?>" height="50" width="50" alt=""><br>
                                                            <label for="company" class=" form-control-label"> Add Option 4</label>
                                                            <input type="file" required name="foptn4" class="form-control" style="padding-bottom:35px;">

                                                            <img src="<?php echo $answer; ?>" height="50" width="50" alt=""><br>
                                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label>
                                                                <input type="file" required name="fanswer" class="form-control" style="padding-bottom:35px;">

                                                                <input type="submit" name="submit2" value="Update Question" class="btn btn-success">

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
if (isset($_POST["submit2"])) {
    $optn1 = $_FILES["foptn1"]["name"];
    $optn2 = $_FILES["foptn2"]["name"];
    $optn3 = $_FILES["foptn3"]["name"];
    $optn4 = $_FILES["foptn4"]["name"];
    $optn5 = $_FILES["fanswer"]["name"];

    $tm = md5(time());

    if ($optn1 !== "") {

        $dst1 = "./optn_images/" . $tm . $optn1;
        $dst_db1 = "/opt_images/" . $tm . $optn1;
        move_uploaded_file($_FILES["foptn1"]["tmp_name"], $dst1);

        mysqli_query($link, "update questions set question='$_POST[fquestion]',optn1='$dst_db1' where id=$id") or die(mysqli_error($link));
    }

    if ($optn2 !== "") {

        $dst2 = "./optn_images/" . $tm . $optn2;
        $dst_db2 = "/opt_images/" . $tm . $optn2;
        move_uploaded_file($_FILES["foptn2"]["tmp_name"], $dst2);

        mysqli_query($link, "update questions set question='$_POST[fquestion]',optn2='$dst_db2' where id=$id") or die(mysqli_error($link));
    }


    if ($optn3 !== "") {

        $dst3 = "./optn_images/" . $tm . $optn3;
        $dst_db3 = "/opt_images/" . $tm . $optn3;
        move_uploaded_file($_FILES["foptn3"]["tmp_name"], $dst3);

        mysqli_query($link, "update questions set question='$_POST[fquestion]',optn3='$dst_db3' where id=$id") or die(mysqli_error($link));
    }

    if ($optn4 !== "") {

        $dst4 = "./optn_images/" . $tm . $optn4;
        $dst_db4 = "/opt_images/" . $tm . $optn4;
        move_uploaded_file($_FILES["foptn4"]["tmp_name"], $dst4);

        mysqli_query($link, "update questions set question='$_POST[fquestion]',optn4='$dst_db4' where id=$id") or die(mysqli_error($link));
    }

    if ($optn5 !== "") {

        $dst5 = "./optn_images/" . $tm . $answer;
        $dst_db5 = "/opt_images/" . $tm . $answer;
        move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

        mysqli_query($link, "update questions set question='$_POST[fquestion]',answer='$dst_db5' where id=$id") or die(mysqli_error($link));
    }
    mysqli_query($link, "update questions set question='$_POST[fquestion]' where id=$id") or die(mysqli_error($link));

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
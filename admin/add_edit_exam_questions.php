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
$exam_catagory = '';
$res = mysqli_query($link, "select * from exam_catagory where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $exam_catagory = $row["catagory"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Question inside <?php echo "<font color='grey'>" . $exam_catagory . "</font>"; ?></h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">

                        <form name="form1" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="col-lg-6" style="margin-top: 16px;">
                                    <div class="card">
                                        <div class="form-group">
                                            <div class="card-header"><strong>Add New Questions with text</strong></div>
                                            <div class="card-body card-block">
                                                <div class="form-group"><label for="company" class=" form-control-label"> Add Question</label>
                                                    <input type="text" name="question" required placeholder="Add question" class="form-control">
                                                </div>
                                                <div class="form-group"><label for="company" class=" form-control-label"> Add Option 1</label>
                                                    <input type="text" name="optn1" placeholder="Add Optn1" class="form-control">
                                                    <div class="form-group"><label for="company" class=" form-control-label"> Add Option 2</label>
                                                        <input type="text" name="optn2" placeholder="Add Optn2" class="form-control">
                                                        <div class="form-group"><label for="company" class=" form-control-label"> Add Option 3</label>
                                                            <input type="text" name="optn3" placeholder="Add Optn3" class="form-control">
                                                            <div class="form-group"><label for="company" class=" form-control-label"> Add Option 4</label>
                                                                <input type="text" name="optn4" placeholder="Add Optn4" class="form-control">


                                                                <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label>
                                                                    <input type="text" name="answer" required placeholder="Add Answer" class="form-control">

                                                                    <input type="submit" name="submit1" value="Add Question" class="btn btn-success">

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- for imagessss-->
                                <div class="col-lg-6" style="margin-top: 16px;">
                                    <div class="card">
                                        <div class="form-group">
                                            <div class="card-header"><strong>Add New Questions with images</strong></div>
                                            <div class="card-body card-block">
                                                <div class="form-group"><label for="company" class=" form-control-label"> Add Question</label>
                                                    <input type="text" name="fquestion" placeholder="Add question" class="form-control">
                                                </div>
                                                <div class="form-group"><label for="company" class=" form-control-label"> Add Option 1</label>
                                                    <input type="file" name="foptn1" class="form-control" style="padding-bottom:35px;">
                                                    <div class="form-group"><label for="company" class=" form-control-label"> Add Option 2</label>
                                                        <input type="file" name="foptn2" class="form-control" style="padding-bottom:35px;">
                                                        <div class="form-group"><label for="company" class=" form-control-label"> Add Option 3</label>
                                                            <input type="file" name="foptn3" class="form-control" style="padding-bottom:35px;">
                                                            <div class="form-group"><label for="company" class=" form-control-label"> Add Option 4</label>
                                                                <input type="file" name="foptn4" class="form-control" style="padding-bottom:35px;">


                                                                <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label>
                                                                    <input type="file" name="fanswer" class="form-control" style="padding-bottom:35px;">

                                                                    <input type="submit" name="submit2" value="Add Question" class="btn btn-success">

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
                    </div>
                </div>
            </div>


            <!--/.col-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Questions</th>
                                <th>Optn1</th>
                                <th>Optn2</th>
                                <th>Optn3</th>
                                <th>Optn4</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>


                            <?php
                            $res = mysqli_query($link, "select * from questions where catagory = '$exam_catagory' order by question_no asc");
                            while ($row = mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>";
                                echo $row["question_no"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["question"];
                                echo "</td>";
                                echo "<td>";
                                if (strpos($row["optn1"], 'opt_images/') !== false) {
                            ?>
                                    <img src="<?php echo $row["optn1"]; ?>" height="50" width="50" alt="">
                                <?php
                                } else {
                                    echo $row["optn1"];
                                }
                                echo "</td>";
                                echo "<td>";
                                if (strpos($row["optn2"], 'opt_images/') !== false) {
                                ?>
                                    <img src="<?php echo $row["optn2"]; ?>" height="50" width="50" alt="">
                                <?php
                                } else {
                                    echo $row["optn2"];
                                }
                                echo "</td>";
                                echo "<td>";
                                if (strpos($row["optn3"], 'opt_images/') !== false) {
                                ?>
                                    <img src="<?php echo $row["optn3"]; ?>" height="50" width="50" alt="">
                                <?php
                                } else {
                                    echo $row["optn3"];
                                }
                                echo "</td>";
                                echo "<td>";
                                if (strpos($row["optn4"], 'opt_images/') !== false) {
                                ?>
                                    <img src="<?php echo $row["optn4"]; ?>" height="50" width="50" alt="">
                                <?php
                                } else {
                                    echo $row["optn4"];
                                }
                                echo "</td>";
                                echo "<td>";
                                if (strpos($row["optn1"], 'opt_images/') !== false) {
                                ?>
                                    <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id ?>">Edit</a>
                                <?php
                                } else {
                                ?>
                                    <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id ?>">Edit</a>
                                <?php
                                }
                                echo "</td>";

                                echo "<td>";

                                ?>
                                <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id ?>">Delete</a>

                            <?php

                                echo "</td>";

                                echo "</tr>";
                            }


                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>








<?php
if (isset($_POST["submit1"])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "select * from questions where catagory='$exam_catagory' order by id asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set question_no='$loop'where id=$row[id]");
        }
    }
    $loop = $loop + 1;
    mysqli_query($link, "insert into questions values(NULL,'$loop','$_POST[question]','$_POST[optn1]','$_POST[optn2]','$_POST[optn3]','$_POST[optn4]','$_POST[answer]','$exam_catagory')") or die(mysqli_error($link));
}
?>
<script type="text/javascript">
    alert {
        "question added successfully"
    };
    window.location.href = window.location.href;
</script>



<?php
if (isset($_POST["submit2"])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "select * from questions where catagory='$exam_catagory' order by id asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set question_no='$loop'where id=$row[id]");
        }
    }
    $loop = $loop + 1;

    $tm = md5(time());


    $fnm1 = $_FILES["foptn1"]["name"];
    $dst1 = "./optn_images/" . $tm . $fnm1;
    $dst_db1 = "/opt_images/" . $tm . $fnm1;
    move_uploaded_file($_FILES["foptn1"]["tmp_name"], $dst1);

    $fnm2 = $_FILES["foptn2"]["name"];
    $dst2 = "./optn_images/" . $tm . $fnm2;
    $dst_db2 = "/opt_images/" . $tm . $fnm2;
    move_uploaded_file($_FILES["foptn2"]["tmp_name"], $dst2);

    $fnm3 = $_FILES["foptn3"]["name"];
    $dst3 = "./optn_images/" . $tm . $fnm3;
    $dst_db3 = "/opt_images/" . $tm . $fnm3;
    move_uploaded_file($_FILES["foptn3"]["tmp_name"], $dst3);

    $fnm4 = $_FILES["foptn4"]["name"];
    $dst4 = "./optn_images/" . $tm . $fnm4;
    $dst_db4 = "/opt_images/" . $tm . $fnm4;
    move_uploaded_file($_FILES["foptn4"]["tmp_name"], $dst4);

    $fnm5 = $_FILES["fanswer"]["name"];
    $dst5 = "./optn_images/" . $tm . $fnm5;
    $dst_db5 = "/opt_images/" . $tm . $fnm5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

    mysqli_query($link, "insert into questions values(NULL,'$loop','$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$exam_catagory')") or die(mysqli_error($link));
}
?>
<script type="text/javascript">
    alert {
        "question added successfully"
    };
    window.location.href = window.location.href;
</script>




<!-- Right Panel -->
<?php
include "footer.php";
?>
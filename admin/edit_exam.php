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
$res = mysqli_query($link, "select * from exam_catagory where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $exam_catagory = $row["catagory"];
    $exam_time = $row["exam_time"];
}

?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Exam Catagories</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="form1" action="" method="POST">
                        <div class="card-body">

                            <div class="col-lg-6" style="margin-top: 16px;">
                                <div class="card">
                                    <div class="card-header"><strong>Edit Exam Catagories</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">New Exam Catagory</label><input type="text" name="examname" placeholder="Enter Exam Catagory" class="form-control" value="<?php echo $exam_catagory; ?>"></div>
                                        <div class="form-group"><label for="vat" class=" form-control-label">Exam Time in Minutes</label><input type="text" name="examtime" placeholder="Exam time in minutes" class="form-control" value="<?php echo $exam_time; ?>"></div>

                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Update exam" class="btn btn-success">

                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST["submit1"])) {
    mysqli_query($link, "update exam_catagory set catagory= '$_POST[examname]',exam_time='$_POST[examtime]' where id=$id") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        window.location = "exam_catagory.php";
    </script>
<?php
}
?>

<?php
include "footer.php";
?>
<?php
session_start();
include "../connection.php";
$exam_catagory = $_GET["exam_catagory"];
$_SESSION["exam_catagory"] = $exam_catagory;
$res = mysqli_query($link, "select * from exam_catagory where catagory='$exam_catagory'");
while ($row = mysqli_fetch_array($res)) {
    $_SESSION["exam_time"] = $row["exam_time"];
}
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"] = "yes";

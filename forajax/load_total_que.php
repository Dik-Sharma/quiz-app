<?php
session_start();
include "../connection.php";
$total_que = 0;
$res1 = mysqli_query($link, "select * from questions where catagory='$_SESSION[exam_catagory]'");
$total_que = mysqli_num_rows($res1);
echo $total_que;

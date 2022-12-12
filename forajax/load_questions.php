<?php
session_start();
include "../connection.php";

$question_no = "";
$question = "";
$optn1 = "";
$optn2 = "";
$optn3 = "";
$optn4 = "";
$answer = "";
$count = 0;
$ans = "";

$queno = $_GET["questionno"];
if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}

$res = mysqli_query($link, "select * from questions where catagory='$_SESSION[exam_catagory]' && question_no=$_GET[questionno]");
$count = mysqli_num_rows($res);
if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($res)) {
        $question_no = $row["question_no"];
        $question = $row["question"];
        $optn1 = $row["optn1"];
        $optn2 = $row["optn2"];
        $optn3 = $row["optn3"];
        $optn4 = $row["optn4"];
    }
?>
    <br>
    <table>
        <tr>
            <td style="font-weight: bold; font-size:18px; padding-left:5px" colspan="2">
                <?php echo "(" . $question_no . ")" . $question; ?>

            </td>
        </tr>
    </table>

    <table style="margin-left: 20px;">
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" onclick="radioclick(this.value,<?php echo $question_no ?>)" value="<?php echo $optn1; ?>" <?php
                                                                                                                                                if ($ans == $optn1) {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                if (strpos($optn1, 'images/') !== false) {
                ?>
                    <img src="admin/<?php echo $optn1; ?>" alt="" height="30" width="30">
                <?php

                } else {
                    echo $optn1;
                }
                ?>
            </td>
        </tr>


        <tr>
            <td>
                <input type="radio" name="r1" id="r1" onclick="radioclick(this.value,<?php echo $question_no ?>)" value="<?php echo $optn2; ?>" <?php
                                                                                                                                                if ($ans == $optn2) {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                if (strpos($optn2, 'images/') !== false) {
                ?>
                    <img src="admin/<?php echo $optn2; ?>" alt="" height="30" width="30">
                <?php

                } else {
                    echo $optn2;
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" onclick="radioclick(this.value,<?php echo $question_no ?>)" value="<?php echo $optn3; ?>" <?php
                                                                                                                                                if ($ans == $optn3) {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                if (strpos($optn3, 'images/') !== false) {
                ?>
                    <img src="admin/<?php echo $optn3; ?>" alt="" height="30" width="30">
                <?php

                } else {
                    echo $optn3;
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" onclick="radioclick(this.value,<?php echo $question_no ?>)" value="<?php echo $optn4; ?>" <?php
                                                                                                                                                if ($ans == $optn4) {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                if (strpos($optn4, 'images/') !== false) {
                ?>
                    <img src="admin/<?php echo $optn4; ?>" alt="" height="30" width="30">
                <?php

                } else {
                    echo $optn4;
                }
                ?>
            </td>
        </tr>

    </table>


<?php
}
?>
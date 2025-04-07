<style>

    h4 {color: green; text-align: center;}
</style>
<?php

foreach($_GET as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

echo "<h4> Welcome - " . $_GET["name"] . "</h4>";
echo "<h4> Your email address is -" . $_GET["email"] . "</h4>";
echo "<h4> Answer -" . $_GET["question1"] . "</h4>";
echo "<h4> Answer -" . $_GET["question2"] . "</h4>";
echo "<h4> Answer -" . $_GET["question3"] . "</h4>";
$ans = ["true", "true", "1"];
$count = 0;
if ($_GET["question1"]== $ans[0])
{$count++;}
if ($_GET["question2"]== $ans[1])
{$count++;}
if ($_GET["question3"]== $ans[2])
{$count++;}
echo "<h4>Correct answers --> $count <h4>";
if ($count ==0) {
    echo "<h4><img src='Failed.jpg' style='border:5px solid red;'></h4>";
}


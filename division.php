<?php

if(isset($_POST['submit']))
{
    $first = $_POST['1st'];
    $second = $_POST['2nd'];
    $ans = $first/$second;
    // unset($_COOKIE['Answer']);
    // setcookie("ans2",$ans,time()+36000,"/");
    
    echo"Division of number".$first." and ".$second." is ".$ans;
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Enter first number: <input name="1st" type="number">
        Enter second number: <input name="2nd" type="number">
        <input type="submit" name="submit">
    </form>
</body>
</html>

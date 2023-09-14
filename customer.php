<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:cornflowerblue; height: 120px;"></header>

    <?php
    $id = $_GET["id"];
    $query1 = "SELECT * FROM `user_` WHERE `USER_ID`='$id'";
    $result1 = mysqli_fetch_assoc(mysqli_query($con, $query1));
    ?>

    <div>
        <h1 style=" display:flex; justify-content:center; font-size:80px; color:black; margin:2%;"><i><b><?= $result1["FIRST_NAME"]." ".$result1["LAST_NAME"]?></b></i></h1>

        <p style=" display:flex; justify-content:center;"><b>Email : </b><?= " ".$result1["EMAIL"]?></p>

        <hr style="opacity: 0;"/>

        <p style=" display:flex; justify-content:center;"><b>Phone Number :</b><?= " +92 ".$result1["PH_NO"]?></p>

        <hr style="opacity: 0;"/>

        <p style=" display:flex; justify-content:center;"><b>Gender :</b><?= " ".$result1["GENDER"]?></p>

        <hr style="opacity: 0;"/>

        <p style=" display:flex; justify-content:center;"><b>Balance :</b><?= " ".$result1["BALANCE"]?></p>

        <hr style="opacity: 0;"/>

        <div style="display:flex; justify-content:center; margin:3%;">

            <?php
            $url = "transfer_money.php?id=".$id;
            ?>

            <button style="  background-color:cornflowerblue; border-radius:10px;  width:500px; height:60px;"><a href="<?= $url?>" style=" font-size:30px; color:black; text-decoration:none;">Transfer Money</a></button>
        </div>
    </div>
    
    <footer style=" background-color:cornflowerblue; height: 100px;"></footer>
</body>
</html>
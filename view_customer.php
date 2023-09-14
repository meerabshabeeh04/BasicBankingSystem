<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:cornflowerblue; height: 120px;"></header>

    <div style=" background-image:url('images/depositphoto.jpg'); background-size:cover; background-attachment:fixed;">

        <hr style=" opacity:0; margin-top:0;"/>
        <hr style=" opacity:0;"/>
        <hr style=" opacity:0;"/>
        <hr style=" opacity:0;"/>

            <?php
            $query = "SELECT * FROM `user_`";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div style=" display:flex; justify-content:center; margin:10px 0px 10px 0px;">
                <hr style=" opacity:0;"/>
                <hr style=" opacity:0;"/>

                <?php
                $url = "customer.php?id=".$row["USER_ID"];
                ?>

                <button style="background-color:cornflowerblue; border-radius:10px;  width:1000px; height:60px;"><a href="<?= $url?>" style=" font-size:30px; color:black; text-decoration:none;"><?= $row["FIRST_NAME"]." ".$row["LAST_NAME"]?></a></button>
                <hr style=" opacity:0;"/>
                <hr style=" opacity:0;"/>
                </div>
                <?php
            }
            ?>
        
        <hr style=" opacity:0;"/>
        <hr style=" opacity:0;"/>
        <hr style=" opacity:0;"/>
        <hr style=" opacity:0; margin-bottom:0;"/>

    </div>
    
    <footer style=" background-color:cornflowerblue; height: 100px;"></footer>
</body>
</html>
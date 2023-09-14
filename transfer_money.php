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

    <?php
    $id = $_GET["id"];
    $query1 = "SELECT * FROM `user_` WHERE `USER_ID`='$id'";
    $result1 = mysqli_fetch_assoc(mysqli_query($con, $query1));
    $query2 = "SELECT * FROM `user_`";
    $result2 = mysqli_query($con, $query2);
    ?>

    <div>
    <?php
            if (isset($_POST["submit"])) {
                $aval_amount = $result1["BALANCE"];
                $req_amount = $_POST["money"];
                $user = $_POST["user"];
                if ($req_amount > $aval_amount) {
                    ?>
                    <div style=" display:flex; justify-content:center;">
                    <div class="alert alert-danger" role="alert" style=" width:500px; height:60px; margin:2%;">
                        Your Bank Balance is less than the amount you wish to Transfer!
                    </div>
                    </div>
                    <?php
                }else{
                    $query3 = "UPDATE `user_` SET `BALANCE`=`BALANCE`-$req_amount WHERE `USER_ID`='$id'";
                    $result3 = mysqli_query($con, $query3);
                    $query4 = "UPDATE `user_` SET `BALANCE`=`BALANCE`+$req_amount WHERE `USER_ID`='$user'";
                    $result4 = mysqli_query($con, $query4);
                    $query5 = "INSERT INTO `transfers`(`TRANSFER_AMOUNT`, `DEPOSITOR`, `CREDITER`) VALUES ('$req_amount','$id','$user')";
                    $result5 = mysqli_query($con, $query5);
                    ?>
                    <div class="text-center" style=" margin-top:2%;">
                        <img src="images/tick.webp" class="rounded img-thumbnail" alt="image" style="width: 80px;height: 80px;">
                    </div>
                    <hr style="opacity:0;"/>
                    <h3 style=" text-align:center; margin-bottom:0%;">Transaction Successfull!</h3>
                    <?php
                }
            }
    ?>
            
        <h1 style=" display:flex; justify-content:center; font-size:80px; color:black; margin:2%;"><i><b>Transfer Money</b></i></h1>

        <form method="post">

            <div style="display:flex; justify-content:center;">
                <select name="user" required>
                    <option value="">Select User to Transfer Money</option>
                    <?php
                    while ($row1 = mysqli_fetch_assoc($result2)) {
                        ?>
                        <option value="<?= $row1["USER_ID"]?>"><?= $row1["FIRST_NAME"]." ".$row1["LAST_NAME"]?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <hr style="opacity: 0;"/>

            <div style=" display:flex; justify-content:center;">
                <input type="text" name="money" placeholder="Enter Money" required/>
            </div>

            <div style="display:flex; justify-content:center; margin:3%;">
                <input type="submit" name="submit" value="submit" style="background-color:cornflowerblue; border-radius:10px;  width:500px; height:60px; font-size:30px; color:black;"/>
            </div>            

        </form>

    </div>

    <hr style=" opacity:0;"/>
    <hr style=" opacity:0;"/>
    <hr style=" opacity:0;"/>
    
    <footer style=" background-color:cornflowerblue; height: 100px;"></footer>
</body>
</html>
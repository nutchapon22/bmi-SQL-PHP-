<?php
    include("conect.php");
    session_start();
    $idb = $_SESSION['id'];
    if(empty($_SESSION['id']))
    {
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <style>
        table#a
        {
            width: 70%;
            border: 2px solid black;
            margin: 1%;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col col-md-1 col-xl-4"></div>
            <div class="col-12  col-md-10 col-xl-4">
                <form name="bmiForm" class="bmi" method="post" action="">
                    <a href="logout.php">Logout</a>
                    <h1 class="text-center">BMI</h1>
                    <hr>
                    <br>
                     <input class="form-control" type="text"  name="weight" placeholder="น้ำหนัก(กิโล)"> 
                   <br>
                    <input class="form-control" type="text"  name="height" placeholder="ส่วนสูง(เซนติเมตร)">
                    <br>
                    <input type="submit" value="คำนวณ" class="btn btn-primary btn-lg btn-block sub" name="s">
                    <br>
                    <input type="reset" value="Reset"  class="btn btn-primary btn-lg btn-block sub bg-success">
                </form>
                <?php
                    if(isset($_POST['s']))
                    {
                        $w = $_POST['weight'];
                        $h = $_POST['height'];
                        $th = $h/100;
                        $bmi = $w/$th**2;
                        if($bmi < 18.50)
                        {
                            $r ="ผอม";
                        }
                        else if($bmi >18.50 && $bmi<24.90)
                        {
                            $r ="ปกติ";
                        }
                        else if($bmi >23 && $bmi<25)
                        {
                            $r ="ท้วม";
                        }
                        else if($bmi >25 && $bmi<29.90)
                        {
                            $r ="อ้วน";
                        }
                        else if($bmi > 30)
                        {
                            $r ="อ้วนมาก";
                        }
                        $sql = "insert into bmidata (weight,height,bmi,result,uid)
                        values ('$w','$h','$bmi','$r','$idb')";
                        $ree = mysqli_query($connect,$sql);
                        if($ree)
                        {
                            
                            header("Refresh:0");
                        }
                        else
                        {
                            echo"มีข้อผิดพลาด".mysqli_error($connect);
                        }
                    }
                ?>
            </div>
            <div class="col col-md-1 col-xl-4"></div>
        </div>
    </div>
    <center>
    <table id="a" class="table">
        <tr>
            <th scope="col">วันเวลา</th>
            <th scope="col">น้ำหนัก</th>
            <th scope="col">ส่วนสูง</th>
            <th scope="col">ค่าBMI</th>
            <th scope="col">ผลลัพธ์</th>
            <th scope="col">ลบ</th>
        </tr>
        <?php
            if(isset($_SESSION['id']))
            {
                $sql = "select bid,bday,weight,height,bmi,result from bmidata where uid ='$idb'";
                $re = mysqli_query($connect,$sql);
                if(mysqli_num_rows($re) > 0)
                {
                    while($row=mysqli_fetch_assoc($re))
                    {
        ?>
                     <tr>
                        <td scope="row"><?php print($row['bday'])?></td>
                        <td><?php print($row['weight'])?></td>
                        <td><?php print($row['height'])?></td>
                        <td><?php print($row['bmi'])?></td>
                        <td><?php print($row['result'])?></td>
                        <td><a href="del.php?bid=<?php print($row['bid'])?>"><button class="btn btn-danger">ลบ</button></a><br></td>
                    </tr>
                    
            <?php
            
                
                    }
                }
            }
            ?>
    </table>
    </center>
    <!--script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>

</html>
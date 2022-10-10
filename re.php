<?php
    include("conect.php");
    $error = array();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <style>
        body
        {
            background-color : white;
        }
        div#ff
        {
            width: 40%;
            height : auto;
            margin-top: 5%;
           
        }
        h2#log
        {
            margin: 5%;
            font-size : 401%;
        }
        form#f
        {
            margin : 10%;
        }
    </style>
    <center>
        <div class="row">
            <div class="col-xl-12">
                <div id ="ff">
                    
                    <h2 id="log">Register</h2>
                    <form action="" method="post" id="f">
                        <div class="form-group">
                            <input type="text" class="form-control" id="b" placeholder="ID" name="id" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="b" placeholder="username" name="u" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="b" placeholder="password" name="p" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="b" placeholder="confirm password" name="cp" required>
                        </div>
                        <!-- <input type="text" name="id" id="r" required> <br>
                        <input type="text" name="u" id="r" required> <br>
                        <input type="password" name="p" id="r" required> <br>
                        <input type="password" name="cp" id="r" required> <br> -->
                        <input type="submit" value="Submit" name="s" class="btn btn-primary btn-lg btn-block">
                        <input type="reset" value="Reset" class="btn btn-primary btn-lg btn-block">
                    </form>
                    <a href="login.php">Back</a>
                </div>
            </div>
        </div>
    </center>
    <?php
        if(isset($_POST['s']))
        {
            $id = $_POST['id'];
            $u = $_POST['u'];
            $p = $_POST['p'];
            $cp = $_POST['cp'];
            
            $ucq = "SELECT * FROM userr Where uid = '$id'";
            $q = mysqli_query($connect,$ucq);
            $r = mysqli_fetch_assoc($q);
            
            if($r['username'] === $u)
            {
                echo "<script>alert('มีไอดีอยู้ในระบบแล้ว');</script>"; 
                array_push($error,"มีไอดีอยู้ในระบบแล้ว");
                header("Refresh:0");
            }
            if($p != $cp)
            {
                echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";
                array_push($error,"รหัสผ่านไม่ตรงกัน");
                header("Refresh:0");
            }
            if(count($error) == 0)
            {
                $p = md5($p);
                $sql = "insert into userr (uid,un,up)
                        values ('$id','$u','$p')";
                $result = mysqli_query($connect,$sql);
                if($result)
                {
                    header('Location: login.php');
                    exit(0);
                }
            }
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
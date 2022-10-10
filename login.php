<?php
    include("conect.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style>
        div#ff
        {
            width: 40%;
            height : auto;
            margin-top: 5%;
            background-color : white;
        }
        h2#log
        {
            margin: 5%;
            font-size : 401%;
        }
        form#f
        {
            margin : 20px;
        }
    </style>
    <center>
        <div class="row">
            <div class="col-xl-12">
                <div class="container" id="ff">
                    <h2 id="log">Login</h2>
                    <hr>
                    <form action="" method="post" id="f">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" id="b" placeholder="ID" name="idd">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="b" placeholder="Password" name="p" required>
                        </div>
                        <input type="submit" value="Login" name="s" class="btn btn-primary btn-lg btn-block">
                            
                    </form>
                    <a href="re.php">Register</a>
                </div>
            </div>
        </div>
   </center>

    <?php
        if(isset($_POST['s']))
        {
            $id = $_POST['idd'];
            $p = $_POST['p'];
            $p = md5($p);

            $sql = "SELECT * FROM userr Where uid = '$id' AND up = '$p'";
            $r = mysqli_query($connect,$sql);
            
            if(mysqli_num_rows($r) == 1)
            {
                $_SESSION['id'] = $id;
                header("location: main.php");
            }
            if(mysqli_num_rows($r) == 0)
            {
                echo "<script>alert('รหัสผ่านหรือไอดีไม่ถูกต้อง');</script>";
                header("Refresh:0");
            }
            
        }
    ?> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>
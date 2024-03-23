<?php 
    session_start();

    include("function/functions.php"); 
    if(check_login())
    {
        header("Location:home.php");
    }


    
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username="";
        $password="";
        if (isset($_POST["username"]))
        {
            if (!empty($_POST["username"])){
                $username=$_POST["username"];
            }
        }
        if (isset($_POST["password"]))
        {
            if (!empty($_POST["password"])){
                $username=$_POST["password"];
            }
        }
        if (empty($username) || empty($password)){
            $_SESSION['message']="you must enter username and password";
            header("Location:login.php");
        } 
        if (!do_login($username,$password)){
            $_SESSION['message']="username and password is not match";
            header("Location:login.php");
            die("Login failed");
        }
        header("Location:home.php");
    }
    // var_dump(@$_SESSION['message']);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail | register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="container-xl">
        <!-- navbar -->
        <?php 
        include("navbar.php"); 
        ?>
        <br>
        <!-- form -->
        <div>
            <form action="login.php" method="post">
                <?php
                    if(isset($_SESSION['message'])):
                        if(!empty($_SESSION['message'])):

                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php 
                        endif;
                    endif;
                    $_SESSION['message']=""
                ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="username">
                </div>
        
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">login</button>
            </form>
        </div>
    </div>
</body>
</html>
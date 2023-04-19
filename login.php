<?php
session_start();
include('db.php');
if(isset($_POST['login'])){   
        $user_name = $_POST['userName'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user_info WHERE user_name='$user_name'";
        $result = mysqli_query($conn ,$sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row['user_password']){
                $_SESSION['isLogged'] = true;                
                $_SESSION['userName'] =$user_name;
                header('location: welcome.php');
            }else{
                echo "<div class='text-center alert alert-danger'>incorrect username or password</div>";
            }
        }else{
            echo "<div class='text-center alert alert-danger'>no user found you must signup first</div>";
        }
    }
    mysqli_close($conn);                    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>login</title>
</head>
<body>
    <div class="container mt-5">
        
        <h1>Login</h1>
        <p><small>please fill this form to login to your account</small></p>
        <div class="row">
            <div class="col-12">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="userName">Username</label>
                        <input class="form-control" type="text" name="userName" id="userName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="login" value="Login">
                    <a class="btn btn-secondary" role="button" href="index.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
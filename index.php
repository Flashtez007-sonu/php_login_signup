<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="login_form">
                    <IMG src="Logo5.png" alt="flashtez007" class="logo img-fluid"></IMG>
                    <?php
                        if(isset($_GET['loginerror'])){
                            $loginerror=$_GET['loginerror'];
                        }
                        if(!empty($loginerror)){
                            echo '<p class="errmsg">Invalid Login Credentials, Please Try Again..
                            </p>';
                        }?>
                    <form action="login_process.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="label_txt">Username or Email</label>
                            <input type="text" name="login_var" value="<?php if(!empty($loginerror
                            )){ echo $loginerror; } ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="label_txt">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="sublogin" class="form_btn btn btn-primary">Login</button>
                    </form>
                    <p style="font-size: 12px; text-align:center; margin-top: 10px;">
                        <a href="forgot-password.php" style="color: #00376b;">Forgot Password</a>
                    </p>
                    <br>
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</html>
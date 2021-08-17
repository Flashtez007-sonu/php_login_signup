<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SignUp Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_POST['signup'])) {
                extract($_POST);
                if (strlen($fname) < 3) //minimum
                {
                    $error[] = 'Please enter first name using 3 character atleast';
                }
                if (strlen($fname) > 20) //maximum
                {
                    $error[] = 'First Name: More than 20 characters are not allowed';
                }
                if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)) {
                    $error[] = 'Invalid Enter First Name. Please Enter letters
                        without any Digit or special symbols like (1,2,3#,$,&,%,*,!,~,`,^,-,)';
                }
                if (strlen($lname) < 3) //minimum
                {
                    $error[] = 'Please enter Last name using 3 character atleast';
                }
                if (strlen($lname) > 20) //maximum
                {
                    $error[] = 'Last Name: More than 20 characters are not allowed';
                }
                if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)) {
                    $error[] = 'Invalid Enter First Name. Please Enter letters
                        without any Digit or special symbols like (1,2,3#,$,&,%,*,!,~,`,^,-,)';
                }
                if (strlen($username) < 3) //minimum
                {
                    $error[] = 'Please enter user name using 3 character atleast';
                }
                if (strlen($username) > 30) //maximum
                {
                    $error[] = ' UserName: More than 30 characters are not allowed';
                }
                if (!preg_match("/^^[^0-9][a-z0-9 ]+([_-]?[a-z0-9])*$/", $username)) {
                    $error[] = 'Invalid Entry User Name. Please lowercase letters
                        without any space and No Number at the start- Eg - myusername, okuniqueser or user123';
                }
                if (strlen($email) > 50) { //maximum
                    $error[] = 'Email: Max Length 50 characters not allowed';
                }
                if ($passwordConfirm == '') {
                    $error[] = 'please confirm the password';
                }
                if ($password != $passwordConfirm) {
                    $error[] = 'Passwords do not match';
                }
                if (strlen($password) < 5) { //minimum
                    $error[] = 'The password is 6 character long.';
                }
                if (strlen($password) > 20) {
                    $error[] = 'Password: Max length 20 Characters not allowed';
                }
                $sql = "select * from users where (username='$username' or email='$email');";
                $res = mysqli_query($dbc, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);
                    if ($username == $row['username']) {
                        $error[] = 'Username already exists.';
                    }
                    if ($email == $row['email']) {
                        $error[] = 'Email already Exists';
                    }
                }
                if (!isset($error)) {
                    $date = date('Y-m-d');
                    $options = array("cost" => 4);
                    $password = password_hash($password, PASSWORD_BCRYPT, $options);

                    $result = mysqli_query($dbc, "INSERT into users values('','$fname',
                    '$lname','$username','$email','$password','$date')");
                    if ($result) {
                        $done = 2;
                    } else {
                        $error[] = 'Failed : Something Went wrong';
                    }
                }
            }
            ?>
            <div class="col-sm-4">
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<p class="errmsg">&#x26A0;' . $error . '</p>';
                    }
                }
                ?>
            </div>
            <div class="col-sm-4">
                <?php if (isset($done)) { ?>
                    <div class="successmsg"><span style="font-size:100px;">&#9989;</span><br>
                        You have registered successfully. <br> <a href="index.php" style="color: #fff;">
                            Login Here...</a></div>
                <?php } else { ?>
                    <div class="signup_form">
                        <IMG src="Logo5.png" alt="flashtez007" class="logo img-fluid"></IMG>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="label_txt">First Name</label>
                                <input type="text" class="form-control" name="fname" value="<?php if (isset($error)) {
                                                                                                echo $fname;
                                                                                            } ?>" required="">
                            </div>
                            <div class="form-group">
                                <label class="label_txt">Last Name</label>
                                <input type="text" class="form-control" name="lname" value="<?php if (isset($error)) {
                                                                                                echo $lname;
                                                                                            } ?>" required="">
                            </div>
                            <div class="form-group">
                                <label class="label_txt">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php if (isset($error)) {
                                                                                                    echo $username;
                                                                                                } ?>" required="">
                            </div>
                            <div class="form-group">
                                <label class="label_txt">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php if (isset($error)) {
                                                                                                    echo $email;
                                                                                                } ?>" required="">
                            </div>
                            <div class="form-group">
                                <label class="label_txt">Password</label>
                                <input type="password" class="form-control" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label class="label_txt">Confirm Password</label>
                                <input type="password" class="form-control" name="passwordConfirm" required="">
                            </div>
                            <br>
                            <button type="submit" name="signup" class="form_btn btn btn-primary">SignUp</button>
                        </form>
                        <br>
                        <p>Have an account? <a href="index.php">Login</a></p>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</html>
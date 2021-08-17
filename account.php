<!DOCTYPE html>
<?php require_once("config.php");
if (!isset($_SESSION["login_sess"])) {
    header("location:index.php");
}
$email = $_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * from users WHERE email=
'$email'");
if ($res = mysqli_fetch_array($findresult)) {
    $username = $res['username'];
    $fname = $res['fname'];
    $lname = $res['lname'];
    $email = $res['email'];
} ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>My Account</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <form action="login_process.php" method="POST">
                    <div class="login_form">
                        <IMG src="Logo5.png" alt="flashtez007" class="logo img-fluid"></IMG>
                        <br>
                        <p><a href="logout.php"><span style="color:red; float:right;">logout
                                </span></a></p>
                        <p>Welcome! <span style="color:#33CC00"><?php echo $username; ?>
                            </span></p>
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td><?php echo $fname; ?></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?php echo $lname; ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?php echo $username; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $email; ?></td>
                            </tr>
                        </table>

                    </div>
                    <div class="col-sm-3">
                    </div>

                </form>
            </div>

        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


</html>
<?php require("registration.class.php") ?>
<?php
if (isset($_POST['submit'])) {
    $user = new RegUser(
        $_POST['login'],
        $_POST['password'],
        $_POST['confirm_password'],
        $_POST['email'],
        $_POST['name']
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div class="wrapper">
        <h2>Create an account</h2>

        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

            <p class="error"><?php echo @$user->errorMessage ?></p>
            <p class="success"><?php echo @$user->successMessage ?></p>

            <input type="text" id="login" name="login" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example4cg">Login</label>

            <input type="password" id="password" name="password" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example4cg">Password</label>

            <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example4cdg">Confirm Password</label>

            <input type="email" id="email" name="email" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example3cg">Email</label>

            <input type="text" id="name" name="name" class="form-control form-control-lg" />
            <label class="form-label" for="form3Example1cg">Name</label>

            <div class="input-box button">
                <input type="submit" id="submit" name="submit" value="Register">
            </div>
            <center>
                <p>Have already an account?
                    <a href="login.php" class="fw-bold text-body">
                        <u>Login here</u>
                    </a>
                </p>
            </center>
        </form>


    </div>
    </section>
</body>

</html>
<?php require("login.class.php") ?>
<?php
if (isset($_POST['submit'])) {
    $user = new Login($_POST['login'], $_POST['password']);
}
?>

<html>

<head>
    <title>Registration</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>

    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Login</h2>

                                <form action="" method="post">

                                    <p class="error"><?php echo @$user->error ?></p>
                                    <p class="error"><?php echo @$user->errorLogin ?></p>
                                    <div class="form-outline mb-4">
                                        <input type="text" name="login" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example3cg">Login</label>
                                    </div>
                                    <p class="error"><?php echo @$user->errorPassword ?></p>
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Password</label>

                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Login</button>
                                    </div>

                                    <p id="div1" class="text-center text-muted mt-5 mb-0">Don't have an account?
                                        <a href="registration.php" class="fw-bold text-body">
                                            <u>Registration here</u>
                                        </a>
                                    </p>

                                    <p class="success"><?php echo @$user->success ?></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>
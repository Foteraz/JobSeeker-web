<?php
session_start();
if(isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or display an error message
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Job Listing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 d-flex img"
                         style="background-image: url(images/bg.jpg);">
                        <div class="text w-100">
                            <h2 class="mb-4">Welcome to Jobify</h2>
                            <p>Jobify is a platform for you to make it easier to find jobs make your living.</p>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="row justify-content-center py-md-5">
                            <div class="col-lg-9">
                                <form action="submit.php" method="post" class="signup-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="date_of_birth">Date of Birth</label>
                                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="status">Marital Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="country">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="gender">Gender</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="address">Home Address</label>
                                                <input type="text" class="form-control" id="address" name="address">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary submit p-3">Create an account</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="w-100">
                                    <p class="mt-4">I'm already a member! <a href="login.php">Sign In</a></p>
                                    <p class="mt-4">Go to <a href="index.php">Home</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

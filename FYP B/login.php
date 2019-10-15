<?php include('server.php') ?>
<!DOCTYPE html>
<html lang='en' data-ng-app='HelpdeskApp'>

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link type="text/css" href="css/helpdesk.css" rel="stylesheet" />
</head>

<body>
    <div data-ng-include="'templates/nav.html'"></div>

    <div class="background">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h2 class="text-center">Sign In</h2>

                            <form method="post" action="login.php">
                                <?php include('errors.php') ?>
                                <div class="form-group">
                                    <label class="m-0" for="username">Username</label>
                                    <input class="form-control w-100 p-10" id="username" type="text" placeholder="Enter Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="m-0" for="password">Password</label>
                                    <input class="form-control w-100 p-10" id="password" type="password" placeholder="Enter Password" name="Password" required>
                                </div>
                                <label>
                                    <input type="checkbox" checked="checked" name="remember"> Remember me
                                </label>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary" type="submit" name="login_user">Login</button>
                                    <p>
                                        Not yet a member? <a href="register.php">Sign up</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    <footer data-ng-include="'templates/footer.html'"></footer>-->

    <!--angular.min.js-->
    <script src="angularjs/angular.min.js"></script>
    <script src="angularjs/angular-ui-router.min.js"></script>
    <script src="angularjs/helpdesk.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

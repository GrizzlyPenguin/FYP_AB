<?php include('server.php') ?>
<!DOCTYPE html>
<html lang='en' data-ng-app='HelpdeskApp'>

<head>
    <title>Employee Register Page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">




    <link type="text/css" href="css/helpdesk.css" rel="stylesheet" />
</head>

<body>
    <!--    <div data-ng-include="'templates/nav.html'"></div>-->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">

            <a class="navbar-brand filter" href="index.php"><img src="img/logo.png" alt="Brand">
                QMHDS
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            Home
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="Dashboard.php#Pending">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="knowledgebase.html">Knowledge Base</a>
                    </li>

                    <li class="nav-item" data-ng-controller="postCtrl">
                        <span class="sr-only" data-ng-init="roleInit('<?php echo $_SESSION['Role']; ?>')"></span>
                        <a class="nav-link" data-ng-show="role=='admin'" href="reg_employee.php">User Management</a>
                    </li>

                    <li class="nav-item" data-ng-controller="postCtrl">
                        <span class="sr-only" data-ng-init="roleInit('<?php echo $_SESSION['Role']; ?>')"></span>
                        <a class="nav-link" data-ng-show="role=='admin'" href="report.php">Report</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="account_edit.php"><?php echo ucfirst($_SESSION['username']); ?></a>
                    </li>

                    <li>
                        <button class="btn btn-danger btn-xs" title="Log Out" onclick=location.href="index.php?logout='1'">LOG OUT</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="background">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h2 class="text-center">Register Employee</h2>
                            <form method="post" action="reg_employee.php">
                                <?php include('errors.php') ?>
                                <div class="form-group">
                                    <label class="m-0" for="name">Username</label>
                                    <input class="form-control w-100 p-10" id="name" type="text" placeholder="Enter Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label class="m-0" for="password1">Password</label>
                                    <input class="form-control w-100 p-10" id="password1" type="password" placeholder="Enter Password" name="Password_1" required>
                                </div>
                                <div class="form-group">
                                    <label class="m-0" for="password2">Re-type Password</label>
                                    <input class="form-control w-100 p-10" id="password2" type="password" placeholder="Confirm Password" name="Password_2" required>
                                </div>
                                <div class="form-group">
                                    <label class="m-0" for="pos">Job Position</label>
                                    <input class="form-control w-100 p-10" id="pos" type="text" placeholder="please enter a position" name="position" required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary" type="submit" name="reg_emp">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--    <div class="fixed-bottom" style="margin-bottom: 0" data-ng-include="'templates/footer.html'"></div>-->

    <!--angular.min.js-->
    <script src="angularjs/angular.min.js"></script>
    <script src="angularjs/angular-route.min.js"></script>
    <script src="angularjs/helpdesk.js"></script>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--popper.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <!--bootstrap js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

 <?php 
include('server.php');
	
?>

<!DOCTYPE html>
<html lang='en' data-ng-app='plunker'>

<head>
    <title>Account</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <link type="text/css" href="css/helpdesk.css" rel="stylesheet" />
    <link type="text/css" href="css/account.css" rel="stylesheet" />
</head>

<body>
    <div data-ng-include="'templates/nav.php'"></div>


    <div class="container top">
        <h2 style="text-align:center;">Account Management</h2>

        <div class="card" style="align-context:cente;">

            <div data-ng-controller="testController">
                <div class="well">
                    <h1><img src="img/icon/profile.png" alt="John" style="width:300px" class="img-circle" ng-click="imgFn()" ng-src="{|imageSource|}"><br>
                        <input type="file" accept="image/*" ng-model="imageSource" onchange="angular.element(this).scope().fileNameChaged(this)" style="font-size:15px">
                    </h1>
                </div>
            </div>
            <?php  if (isset($_SESSION['username'])) : ?>
            <div class="accountdetail">
                <label id="name"><strong>Name:</strong></label><br /><input type="text" class="input-large" value="<?php echo $_SESSION['Name'] ?>" readonly />
                <br />
                <label id="email"><strong>Address:</strong></label><br />
                <input type="text" value="<?php echo $_SESSION['Address'] ?>" class="input-large" readonly /><br /><br />
                <label id="ContactN"><strong>Contact Number:</strong></label><br />
                <input type="text" id="telephone" value="<?php echo $_SESSION['ContactNumber'] ?>" readonly /><br />
                <label><strong>E-mail:</strong></label><br />
                <input type="text" id="email" value="<?php echo $_SESSION['Email'] ?>" /><br />

                <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Change Password</button></p>
            </div>
            <div class="container">

                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog mw-100 w-75">
                        <div class="modal-content" data-ng-controller="putCtrl">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Change Password</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="post">
                                   <?php include('errors.php') ?>
                                    <!--
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Type of Problems</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>sample 01</option>
                                    <option>sample 02</option>
                                    <option>sample 03</option>
                                    <option>sample 04</option>
                                    <option>sample 05</option>
                                </select>
                            </div>
-->
                                    <div class="form-group">
                                        <label for="Old Password">Current Password</label>
                                        <input type="password" class="form-control w-75" name="Password_1" id="Password" data-ng-model="oldPw">
                                    </div>
                                    <div class="form-group">
                                        <label for="Textarea1">New Password</label>
                                        <input type="password" id="NewPassword" class="form-control w-75" name="NewPassword" data-ng-model="newPw">
                                    </div>
                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                                <button type="submit" form="ticketForm" value="Submit" data-ng-click="putPassword(oldPw, newPw)" class="btn btn-primary" type="submit" name="change_pw" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <?php endif ?>



    </div>
    <!--<div class="footer"data-ng-include="'templates/footer.html'"></div>-->
    <div class="fixed-bottom" style="margin-bottom: 0" data-ng-include="'templates/footer.html'"></div>


    <!--angular.min.js-->
    <script src="angularjs/angular.min.js"></script>
    <script src="angularjs/angular-route.min.js"></script>
    <script src="angularjs/app.js"></script>
    <script src="angularjs/helpdesk.js"></script>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--popper.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <!--bootstrap js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

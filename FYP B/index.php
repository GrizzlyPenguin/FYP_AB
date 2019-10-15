<?php 
	session_start(); 
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
        unset($_SESSION['CustID']);
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html lang="en" data-ng-app='HelpdeskApp'>

<head>
    <title>Welcome to Multichannel Helpdesk Support System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">


    <link type="text/css" href="css/helpdesk.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">

            <a class="navbar-brand filter" href="index.php"><img src="img/logo.png" alt="Brand">
                MCHDS
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
            <div class="container vertical-center" id="test">

                <h1 class="col-md-8 col-sm-8 col-xs-8 p-0">Welcome to Multichannel Helpdesk Support System,
                    <span class="upper">
                        <?php echo $_SESSION['username']; ?>
                    </span>
                </h1>

                <p>Your satisfaction is our desire</p>

                <div class="button-group">
                    <!--<div class="text-center">-->
                    <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                        Submit Ticket
                    </button>

                    <a class="btn" href="knowledgebase.html">FAQ</a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="container">

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content" data-ng-controller="postCtrl">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ticket Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="get" id="ticketForm">
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
                                <label for="title">Title</label>
                                <input type="text" class="form-control w-100" data-ng-model="TicketTitle" id="title">
                            </div>
                            <div class="form-group">
                                <label for="Textarea1">Description</label>
                                <textarea class="form-control" id="Textarea1" rows="3" data-ng-model="TicketDesc"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="warranty">Warranty</label> <br/>
                                    <label>
                                    <input type="radio" ng-model="warranty" value="yes">Yes
                                    <span style="margin-right: 25px"></span>
                                    <input type="radio" ng-model="warranty" value="no">No
                                </label><br/>
                            </div>
                            <div class="form-group">
                                <label for="domain">Domain name</label>
                                <input type="text" class="form-control w-100" data-ng-model="domain" id="domain">
                            </div>
                            <div class="form-group">
                                <label for="FormControlFile1">Attachments</label>
                                <input type="file" class="form-control-file" id="FormControlFile1">
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <span class="sr-only" data-ng-init="userInit('<?php echo $_SESSION['CustID']; ?>')"></span>
                        <button type="submit" form="ticketForm" value="Submit" class="btn btn-primary" data-ng-click="postData(TicketTitle, TicketDesc, UserID, warranty, domain)" data-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
        window.__lc = window.__lc || {};
        window.__lc.license = 10938732;
        (function() {
            var lc = document.createElement('script');
            lc.type = 'text/javascript';
            lc.async = true;
            lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(lc, s);
        })();

    </script>
    <noscript>
        <a href="https://www.livechatinc.com/chat-with/10938732/" rel="nofollow">Chat with us</a>,
        powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
    </noscript>
    <!-- End of LiveChat code -->


    <div class="fixed-bottom" style="margin-bottom: 0" data-ng-include="'templates/footer.html'"></div>

    <!--angular.min.js-->
    <script src="angularjs/angular.min.js"></script>
    <script src="angularjs/angular-route.min.js"></script>
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

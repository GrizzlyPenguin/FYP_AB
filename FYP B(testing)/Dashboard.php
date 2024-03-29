<?php
    include "server.php"
?>

<!DOCTYPE html>
<html lang='en' data-ng-app='HelpdeskApp'>

<head>
    <title>Personal Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link type="text/css" href="css/helpdesk.css" rel="stylesheet" />
</head>

<body>

    <div data-ng-include="'templates/nav.php'"></div>

    <div class="container top">
        <div class="row" style="margin-top:50px;">
            <div class="col-md-3">
                <div data-ng-include="'templates/sidebar.php'"></div>
            </div>
            <!--table-->
            <div data-ng-view class="col-md-9 pl-md-0"></div>
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
    
    <!--angular.min.js-->
    <script src="angularjs/angular.min.js"></script>
    <script src="angularjs/angular-route.min.js"></script>
    <script src="angularjs/helpdesk.js"></script>
    <script src="angularjs/pagination.js"></script>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--popper.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />  
   
    <!--bootstrap js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

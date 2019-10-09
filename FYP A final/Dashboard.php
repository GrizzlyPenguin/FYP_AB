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
        <div class="row">
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
                                <label for="FormControlFile1">Attachments</label>
                                <input type="file" class="form-control-file" id="FormControlFile1">
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <span class="sr-only" data-ng-init="userInit('<?php echo $_SESSION['CustID']; ?>')"></span>
                        <button type="submit" form="ticketForm" value="Submit" class="btn btn-primary" data-ng-click="postData(TicketTitle, TicketDesc, UserID)" data-dismiss="modal">Submit</button>
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
    
    <!--angular.min.js-->
    <script src="angularjs/angular.min.js"></script>
    <script src="angularjs/angular-route.min.js"></script>
    <script src="angularjs/Helpdesk.js"></script>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--popper.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />  
   
    <!--bootstrap js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

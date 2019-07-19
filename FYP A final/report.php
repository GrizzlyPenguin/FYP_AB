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
      <h2>Report</h2>
       <div class="row" data-ng-controller="chartCtrl">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="taskOverview"></div>
            </div>
        </div>
        <div class="row" data-ng-controller="chartCtrl">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="spiderWeb"></div>
            </div>
        </div>
        <div class="row" data-ng-controller="chartCtrl">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="performance"></div>
            </div>
        </div>
    </div>

    <div data-ng-include="'templates/footer.html'"></div>

    <!--angular.min.js-->
    <script src="angularjs/angular.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
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

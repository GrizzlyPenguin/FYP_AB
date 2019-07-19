<?php
    include "../server.php"
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-blue">
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

<?php
include('../server.php');
?>

<div data-ng-controller="postCtrl" style="margin-top:50px">
    <span class="sr-only" data-ng-init="roleInit('<?php echo ucfirst($_SESSION['Role']); ?>')"></span>
    <div class="col-md-12 col-sm-12 col-xs-12 p-0">
        <div class="sidebar" id="sidebar-wrapper">
            <div class="welcome">
                <h5><b class="text-danger">{{role}}</b></h5>
                <p>Welcome <a class="nav-link p-0 m-0" href="account_edit.php"><?php echo ucfirst($_SESSION['username']); ?></a></p>
               <!-- <p>Last Sign in: 28 May 2019, 2:17pm</p> -->
            </div>

            <hr />
            <h5><b>Task Status</b></h5>
            <ul class="list-unstyled components">
                <li data-ng-show="role" >
                    <a href="#All">All</a>
                </li>
                <li data-ng-show="role" >
                    <a href="#Open">Open</a>
                </li>
                <hr />
                <li class="active">
                    <h5><b>Personal</b></h5>
                    <ul class="list-unstyled collapse show" id="Pending">
                        <li>
                            <a href="#Pending">Pending</a>
                        </li>
                        <li>
                            <a href="#Solved">Solved</a>
                        </li>
                        <li>
                            <a href="#PersonalAll">All</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>

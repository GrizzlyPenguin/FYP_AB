<?php 
	session_start();
?>
<div data-ng-controller="putCtrl">
    <div class="table-tasks " data-ng-controller="getCtrl">
        <div ng-controller="sort">
            <div class="tableTitle">
                <div class="row">
                    <h3>Personal Solved tasks</h3>

                    <div class="col p-0">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right">+ Ticket</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="personal" class="table table-sm table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th ng-click='sortColumn("ticketNo")' class="th-sm">Ticket No
                            </th>
                            <th ng-click='sortColumn("title")' class="th-sm">Title
                            </th>
                            <th ng-click='sortColumn("desc")' class="th-sm">Description
                            </th>
                            <th ng-click='sortColumn("pid")' class="th-sm">PID
                            </th>
                            <th ng-click='sortColumn("date")' class="th-sm">Date Created
                            </th>
                            <th ng-click='sortColumn("status")' class="th-sm">Status
                        </tr>
                    </thead>
                    <div>
                        <span class="sr-only" data-ng-init="empInit('<?php echo $_SESSION['EmpID']; ?>')"></span>
                        <span class="sr-only" data-ng-init="custInit('<?php echo $_SESSION['CustID']; ?>')"></span>
                        <tbody>
                            <tr data-ng-repeat="ticket in tickets |orderBy:column:reverse|filter:searchText" data-ng-show="(ticket.pid==CustID && ticket.status=='Solved') || (ticket.StaffID==EmpID && ticket.status=='Solved') " data-ng-click="init(ticket)">
                                <td>{{ticket.ticketNo}}</td>
                                <td>{{ticket.title}}</td>
                                <td>{{ticket.desc}}</td>
                                <td>{{ticket.pid}}</td>
                                <td>{{ticket.date}}</td>
                                <td>{{ticket.status}}</td>
                            </tr>
                        </tbody>
                    </div>
                </table>
            </div>



        </div>
    </div>
</div>

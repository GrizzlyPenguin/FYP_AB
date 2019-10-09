<?php 
	session_start();
?>

<div class="col-md-12 col-sm-12 col-xs-12 p-0">
    <div class="table-tasks" data-ng-controller="putCtrl">
        <div ng-controller="sort">
            <h3>Open tasks</h3>
            <div class="table-responsive">
                <table data-ng-controller="getCtrl" id="open" class="table table-striped table-sm table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th ng-click='sortColumn("ticketNo")' class="th-sm">Ticket No
                            </th>
                            <th ng-click='sortColumn("title")' class="th-sm">Title
                            </th>
                            <th ng-click='sortColumn("desc")' class="th-sm">Description
                            </th>
                            <th ng-click='sortColumn("pid")' class="th-sm">Name
                            </th>
                            <th ng-click='sortColumn("date")' class="th-sm">Date Created
                            </th>
                            <th class="th-sm">Action
                            </th>
                        </tr>
                    </thead>
                    <div>
                        <span class="sr-only" data-ng-init="empInit('<?php echo $_SESSION['EmpID']; ?>')"></span>
                        <script>console.log(tickets.length);</script>
                        <tbody>
                            <tr class="text-center" data-ng-repeat="ticket in tickets|orderBy:column:reverse|filter:searchText" data-ng-show="ticket.status=='Open'">
                                <td>{{ticket.ticketNo}}</td>
                                <td>{{ticket.title}}</td>
                                <td>{{ticket.desc}}</td>
                                <td>{{ticket.Name}}</td>
                                <td>{{ticket.date}}</td>
                                <td><button class="btn btn-primary" data-ng-click="putData(ticket.ticketNo, EmpID)">Accept</button></td>
                            </tr>
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>

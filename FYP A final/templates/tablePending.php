<?php 
	session_start();
?>
<div data-ng-controller="putCtrl">

    <div class="table-tasks" data-ng-controller="getCtrl">
        <div ng-controller="sort">
            <div data-ng-controller="postCtrl">
                <span class="sr-only" data-ng-init="roleInit('<?php echo $_SESSION['Role']; ?>')"></span>
                <div class="tableTitle">
                    <div class="row">
                        <h3 data-ng-show="role">To-Do-List</h3>
                        <h3 data-ng-hide="role">Task list</h3>

                        <div class="col p-0" data-ng-show="role">
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
                                </th>
                                <th data-ng-show="role" class="th-sm">Edit
                                </th>
                            </tr>
                        </thead>
                        <div>
                            <span class="sr-only" data-ng-init="empInit('<?php echo $_SESSION['EmpID']; ?>')"></span>
                            <span class="sr-only" data-ng-init="custInit('<?php echo $_SESSION['CustID']; ?>')"></span>
                            <tbody>
                                <tr data-ng-repeat="ticket in tickets |orderBy:column:reverse|filter:searchText" data-ng-show="((ticket.status=='Pending' && ticket.StaffID==EmpID) ||ticket.pid==CustID && (ticket.status=='Pending' || ticket.status=='Solved' || ticket.status=='Open'))" data-ng-click="init(ticket)">
                                    <td>{{ticket.ticketNo}}</td>
                                    <td>{{ticket.title}}</td>
                                    <td>{{ticket.desc}}</td>
                                    <td>{{ticket.pid}}</td>
                                    <td>{{ticket.date}}</td>
                                    <td class="{{ticket.status}}"><b>{{ticket.status}}</b></td>
                                    <td data-ng-show="role">
                                        <button id="edit" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#editModal" data-ng-click="init(ticket)"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </div>
                    </table>
                </div>

                <div class="modal fade" id="editModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

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
                                        <input type="text" class="form-control w-100" data-ng-model="title" id="title">
                                    </div>

                                    <div class="form-group">
                                        <label for="Textarea">Description</label>
                                        <textarea class="form-control" id="Textarea" rows="3" data-ng-model="desc"></textarea>
                                    </div>
                                    <hr />

                                    <div class="contact">
                                        <h4>Customer</h4>
                                        <div class="form-group">
                                            <label for="Textarea"><b>Company Name</b></label>
                                            <p class="w-100 p-0" id="Textarea">PC image</p>

                                            <label for="Textarea"><b>Email</b></label>
                                            <p class="w-100 p-0" id="Textarea">PCimage@gmail.com</p>
                                            <label for="Textarea"><b>Contact Number</b></label>
                                            <p class="w-100 p-0" id="Textarea">0168729812</p>
                                        </div>

                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <h6>Previous Activities</h6>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="th-sm">Title
                                                        </th>
                                                        <th class="th-sm">Activity
                                                        </th>
                                                        <th class="th-sm">Date
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <div>
                                                    <tbody>
                                                        <tr data-ng-repeat="ticket in tickets" data-ng-show="ticket.status=='Pending'" data-ng-click="init(ticket)">
                                                            <td>{{ticket.title}}</td>
                                                            <td>Have try search through the Knowledge base yet cannnot find out the problem, at least it is not server's problem</td>
                                                            <td>{{ticket.date}}</td>
                                                        </tr>
                                                    </tbody>
                                                </div>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Textarea2">Log</label>
                                        <textarea class="form-control" id="Textarea2" rows="3" data-ng-model="log"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="browser-default custom-select" id="status" data-ng-model="TicketStatus" data-ng-init="TicketStatus='Pending'">
                                            <option value="Open">Open</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Solved">Solved</option>
                                        </select>
                                    </div>


                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" form="ticketForm" value="Submit" class="btn btn-primary" data-ng-click="putForm(tno, title, desc, TicketStatus)" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

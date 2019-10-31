<?php 
	session_start();
?>
<div data-ng-controller="putCtrl">
    <div class="table-tasks " data-ng-controller="getCtrl">
        <div ng-controller="sort" style="margin-top:50px; margin-left:20px">
            <div class="tableTitle">
                <div class="row">
                    <h3>Personal All Tasks</h3>

                    <div class="col p-0">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right">+ Ticket</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="personal" class="table table-sm table-striped table-bordered table-hover">
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
                            <th ng-click='sortColumn("status")' class="th-sm">Status
                            </th>
                        </tr>
                    </thead>
                    <div>
                        <span class="sr-only" data-ng-init="empInit('<?php echo $_SESSION['EmpID']; ?>')"></span>
                        <span class="sr-only" data-ng-init="custInit('<?php echo $_SESSION['CustID']; ?>')"></span>
                        <tbody>
                            <tr class="text-center" data-ng-repeat="ticket in tickets |orderBy:column:reverse|filter:searchText" data-ng-show="(((ticket.status=='Pending' || ticket.status=='Solved') && ticket.StaffID==EmpID) ||ticket.pid==CustID && (ticket.status=='Pending' || ticket.status=='Solved' || ticket.status=='Open'))" data-ng-click="init(ticket)">
                                <td>{{ticket.ticketNo}}</td>
                                <td>{{ticket.title}}</td>
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:10px;">{{ticket.desc}}</td>
                                <td>{{ticket.Name}}</td>
                                <td>{{ticket.date}}</td>
                                <td class="{{ticket.status}}"><b>{{ticket.status}}</b></td>
                            </tr>
                        </tbody>
                    </div>
                </table>
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
        </div>
    </div>

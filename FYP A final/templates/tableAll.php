 <div data-ng-controller="getCtrl">
     <div class="col-md-12 col-sm-12 col-xs-12 p-0">
         <div class="table-tasks">
             <div ng-controller="sort">
                 <div ng-controller="search">
                     <div class="tableTitle">
                         <div class="row">
                             <h3>All tasks</h3>
                             <div class="col p-0">
                                 <button data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right">+ Ticket</button>
                             </div>
                         </div>
                     </div>
                     <div class="form-inline">
                         <label for="searchType">Search by:</label>
                         <select id="searchType" class="form-control" ng-model="searchcol">
                             <option value='$' selected>Any</option>
                             <option value='ticketNo'>ticketNo</option>
                             <option value='title'>title</option>
                             <option value='desc'>desc</option>
                             <option value='pid'>pid</option>
                             <option value='date'>date</option>
                             <option value='status'>status</option>
                         </select>
                         <input class="form-control" type="text" ng-model="searchword[searchcol]" placeholder="Search Ticket">
                     </div>

                     <div class="table-responsive">
                         <table id="open" class="table table-striped table-sm table-bordered table-hover">
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
                                     <th class="th-sm">Action
                                     </th>
                                     <th ng-click='sortColumn("status")' class="th-sm">Status
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr data-ng-repeat="ticket in tickets|orderBy:column:reverse|filter:searchword">
                                     <td>{{ticket.ticketNo|number}}</td>
                                     <td>{{ticket.title}}</td>
                                     <td>{{ticket.desc}}</td>
                                     <td>{{ticket.pid}}</td>
                                     <td>{{ticket.date}}</td>
                                     <td class="text-center"><button data-toggle="modal" data-target="#viewModal" class="btn btn-primary" data-ng-click="init(ticket)">View</button></td>
                                     <td class="{{ticket.status}}"><b>{{ticket.status}}</b></td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!--myModal-->
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

     <!--viewModal-->
     <div class="modal fade" id="viewModal">
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

                         <div class="form-group">
                             <label for="title"><b>Title</b></label>
                             <p class="w-100 p-0" id="title">{{title}}</p>
                         </div>

                         <div class="form-group">
                             <label for="Textarea"><b>Description</b></label>
                             <p class="w-100 p-0" id="Textarea">{{desc}}</p>
                         </div>

                         <hr />

                         <div class="contact">
                             <h4>Contact</h4>
                             <div class="form-group">
                                 <label for="Textarea"><b>Company Name</b></label>
                                 <p class="w-100 p-0" id="Textarea">PC image</p>
                                 
                                 <label for="Textarea"><b>Email</b></label>
                                 <p class="w-100 p-0" id="Textarea">PCimage@gmail.com</p>
                                 <label for="Textarea"><b>Contact Number</b></label>
                                 <p class="w-100 p-0" id="Textarea">0168729812</p>
                             </div>

                         </div>
                         <hr/>
                         <div class="form-group">
                             <h4>Previous Activities</h4>
                             <div class="table-responsive">
                                 <table class="table table-striped table-bordered table-hover">
                                     <thead>
                                         <tr>
                                             <th class="th-sm">Date
                                             </th>
                                             <th class="th-sm">Activity
                                             </th>
                                         </tr>
                                     </thead>
                                     <div>
                                         <tbody>
                                             <tr data-ng-repeat="ticket in tickets" data-ng-show="ticket.status=='Pending'">
                                                 <td>{{ticket.date}}</td>
                                                 <td>Have try search through the Knowledge base yet cannnot find out the problem, at least it is not server's problem</td>
                                             </tr>
                                         </tbody>
                                     </div>
                                 </table>
                             </div>
                         </div>

                     </form>
                 </div>

                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div data-ng-controller="getCtrl">
     <div data-ng-controller="postCtrl">
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
                                         <th ng-click='sortColumn("pid")' class="th-sm">Name
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
                                     <tr class="text-center" data-ng-repeat="ticket in tickets|orderBy:column:reverse|filter:searchword">
                                         <td>{{ticket.ticketNo|number}}</td>
                                         <td>{{ticket.title}}</td>
                                         <td>{{ticket.desc}}</td>
                                         <td>{{ticket.Name}}</td>
                                         <td>{{ticket.date}}</td>
                                         <td class="text-center"><button data-toggle="modal" data-target="#viewModal" class="btn btn-primary" data-ng-click="init(ticket); searchName(ticket.pid)">View</button></td>
                                         <td class="{{ticket.status}}"><b>{{ticket.status}}</b></td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!--viewModal-->
         <div class="modal fade" id="viewModal">
             <div class="modal-dialog modal-lg">
                 <div class="modal-content">

                     <!-- Modal Header -->
                     <div class="modal-header">
                         <h4 class="modal-title">Ticket Form</h4>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>

                     <!-- Modal body -->
                     <div class="modal-body">
                         <form method="get" id="ticketForm">

                             <!--customer section-->
                             <div id="customer_section">
                                 <div class="row">
                                     <div class="col-md-6 col-sm-6">
                                         <label for="ticNo" class="font-weight-bold">Ticket No: </label>
                                         <label id="ticNum">{{tno}}</label>
                                     </div>
                                     <div class="col-md-6 col-sm-6" style=" white-space: nowrap">
                                         <label for="warranty" class="font-weight-bold">Warranty:</label>
                                         <img src="img/q_mark.png" title="Is your work or system is still in warranty?" style="max-width: 15px; max-height: 15px;">
                                         <br>
                                         <input type="radio" value="yes" data-ng-hide="warran=='yes'" />
                                         <input type="radio" value="yes" data-ng-show="warran=='yes'" checked />
                                         <label>Yes</label>
                                         <span class="pl-3"></span>
                                         <input type="radio" value="no" data-ng-hide="warran=='no'" />
                                         <input type="radio" value="no" data-ng-show="warran=='no'" checked />
                                         <label>No</label>
                                     </div>
                                 </div>
                             </div>
                             <br />
                             <div class="row">
                                 <div class="col-md-6 col-sm-12">
                                     <label for="namelbl" class="font-weight-bold">Client Name:</label><br />
                                     <input type="text" readonly class="form-control" value="{{CustName}}">
                                 </div>
                                 <div class="col-md-6 col-sm-12">
                                     <label for="domainlbl" class="font-weight-bold">Domain Name:</label>
                                     <input type="text" class="form-control w-100" value="{{domainName}}" readonly />
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
 </div>

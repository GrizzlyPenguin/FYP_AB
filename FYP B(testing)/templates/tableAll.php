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
                                     <tr data-ng-repeat="ticket in tickets|orderBy:column:reverse|filter:searchword">
                                         <td>{{ticket.ticketNo|number}}</td>
                                         <td>{{ticket.title}}</td>
                                         <td>{{ticket.desc}}</td>
                                         <td>{{ticket.Name}}</td>
                                         <td>{{ticket.date}}</td>
                                         <td class="text-center"><button data-toggle="modal" data-target="#viewModal" class="btn btn-primary" data-ng-click="init(ticket); searchName(ticket.pid)">View</button></td>
                                         <td class="{{ticket.status}} text-center"><b>{{ticket.status}}</b></td>
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
                                     <div class="col-md-6 col-sm-12">
                                         <label for="ticNo" class="font-weight-bold">Ticket No: </label>
                                         <label id="ticNum">{{tno}}</label>
                                     </div>
                                     <div class="col-md-6 col-sm-12">
                                         <label for="warranty" class="font-weight-bold">Warranty:</label>
                                         <!--                                         <img src="img/q_mark.png" title="Is your work or system is still in warranty?" style="max-width: 15px; max-height: 15px;">-->
                                         <span class="text-capitalize">{{warran}}</span>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6 col-sm-12">
                                         <label for="namelbl" class="font-weight-bold">Client Name:</label>
                                         {{CustName}}
                                         <!--<input type="text" readonly class="form-control w-100" value="{{CustName}}">-->
                                     </div>
                                     <div class="col-md-6 col-sm-12">
                                         <label for="domainlbl" class="font-weight-bold">Domain Name:</label>
                                         {{domainName}}
                                         <!--<input type="text" class="form-control w-100" value="{{domainName}}" readonly />-->
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12 col-sm-12">
                                         <label class="font-weight-bold">Description:</label>
                                         {{cust_desc}}
                                         <!--<textarea value="{{cust_desc}}" data-ng-model="diagnosis" class="form-control w-100" rows="3" readonly></textarea>-->
                                     </div>
                                 </div>
                             </div>
                             <br />
                             <hr>
                             <div class="row">
                                 <div class="col-md-6">
                                     <label for="source" class="font-weight-bold">Source Code: </label>
                                     <br />
                                     <input type="text" class="form-control w-100" placeholder="Online cloud" />
                                     <p></p>
                                     <input type="text" class="form-control w-100" placeholder="Offline Source" />
                                 </div>
                                 <div class="col-md-6">
                                     <label class="font-weight-bold">Job Type: </label>
                                     <select class="browser-default custom-select">
                                         <option value="log">Problem Log</option>
                                         <option value="query">Query</option>
                                     </select>
                                 </div>

                             </div>
                             <br />
                             <hr>
                             <div class="row">
                                 <div class="col-md-12">
                                     <label class="font-weight-bold">Additional Description: </label>
                                     {{addDesc}}
                                     <br />
                                 </div>
                             </div>

                             <hr>
                             <!--lvl a-->
                             <label class="font-weight-bold">History: </label> <br>
                             <table class="table table-sm table-striped table-bordered table-hover">
                                 <thead>
                                     <tr>
                                         <th>Diagnosis</th>
                                         <th>Findings</th>
                                         <th>Others</th>
                                         <th>Cause</th>
                                         <th>Written by</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr data-ng-repeat="log in logs">
                                         <td>{{log.diagnosis}}</td>
                                         <td>{{log.findings}}</td>
                                         <td>{{log.others}}</td>
                                         <td>{{log.cause}}</td>
                                         <td>{{log.writtenBy}}</td>
                                     </tr>
                                 </tbody>
                             </table>
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

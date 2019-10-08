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
                                        <button id="edit" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#editModal" data-ng-click="init(ticket); searchName(ticket.pid); getLog(ticket.pid, ticket.ticketNo)"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </div>
                    </table>
                </div>

                <div class="modal fade" id="editModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Ticket Form</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="post" id="ticketForm" class="form-control" style="height:100%; padding: 20px;">

                                    <!--customer section-->
                                    <div id="customer_section">
                                        <div class="row">
                                            <div class="col">
                                                <label for="ticNo">Ticket No: </label>
                                                <label id="ticNum">{{tno}}</label>
                                            </div>
                                            <div class="col" style="margin-left: 20px; white-space: nowrap">
                                                <label for="warranty">Warranty: </label>
                                                <img src="img/q_mark.png" title="Is your work or system is still in warranty?" style="max-width: 15px; max-height: 15px;">
                                                <br>
                                                <input type="radio" value="yes" />
                                                <label>Yes</label>
                                                <br>
                                                <input type="radio" value="no" />
                                                <label>No</label>
                                            </div>

                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col">

                                                <label for="namelbl">Client Name:</label>
                                                <input type="text" value="{{CustName}}" readonly />
                                            </div>
                                            <div class="col">
                                                <label for="domainlbl" style="margin-left: 20px">Domain Name:</label>
                                                <input type="text" value="{{domainName}}" readonly />
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col">
                                                <label for="source">Source Code: </label>
                                                <br />
                                                <input style="margin-left: 50px;" type="button" value="Online Cloud" onclick="window.location.href='https://www.google.com'" />
                                                <p></p>
                                                <input style="margin-left: 50px;" type="button" value="Offline Source" onclick="window.location.href='https://www.yahoo.com'" />
                                            </div>
                                            <div class="col">
                                                <label style="margin-left: 20px">Job Type: </label>
                                                <select>
                                                    <option value="log">Problem Log</option>
                                                    <option value="query">Query</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <!--lvl a-->
                                    <div data-ng-model="historyLog">
                                        <p>Level A:</p>

                                        <label>Diagnosis:</label> <br>
                                        <textarea value="{{historyLog.diagnosis}}" data-ng-model="diagnosis" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label> Findings:</label> <br>
                                        <textarea value="{{historyLog.findings}}" data-ng-model="findings" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label>Others:</label> <br>
                                        <textarea value="{{historyLog.others}}" data-ng-model="others" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label>Nature of Cause:</label> <br>
                                        <textarea value="{{historyLog.cause}}" data-ng-model="cause" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label>Log:</label> <br>
                                        <table border="1px">
                                            <tr>
                                                <th>Log</th>
                                                <th>Time Planned</th>
                                                <th>Start Date / Time</th>
                                                <th>Complete Date / Time</th>
                                                <th>Total Time Used</th>
                                                <th>Status</th>
                                                <th>UAT</th>
                                            </tr>
                                            <tr>
                                                <td>log id</td>
                                                <td>time-planned</td>
                                                <td>start_dt</td>
                                                <td>fin_dt</td>
                                                <td>time_used</td>
                                                <td>stat</td>
                                                <td>user_test</td>
                                            </tr>
                                        </table>
                                        <br>
                                        <label id="lastedit" style="color: black"> Last Edited by: </label> <br>
                                        <label id="lasteditname" style="font-style: normal; font-weight: normal">date_name_id</label>
                                        <p>or do it using list</p>
                                    </div>
                                    <hr>
                                    <!--            lvl b-->
                                    <div id="lvlb_section">
                                        <p>Level B:</p>

                                        <label>Diagnosis:</label> <br>
                                        <textarea class="form-control z-depth-1" data-ng-model="diagnosis1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label>Findings:</label>
                                        <br>
                                        <textarea class="form-control z-depth-1" data-ng-model="findings1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label>Others:</label> <br>
                                        <textarea class="form-control z-depth-1" data-ng-model="others1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label>Nature of Cause:</label> <br>
                                        <textarea class="form-control z-depth-1" data-ng-model="cause1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                        <br>
                                        <label>Log:</label> <br>
                                        <table>
                                            <tr>
                                                <th>Log</th>
                                                <th>Time Planned</th>
                                                <th>Start Date/Time</th>
                                                <th>Complete Date/Time</th>
                                                <th>Total Time Used</th>
                                                <th>Status</th>
                                                <th>UAT</th>
                                            </tr>
                                            <tr>
                                                <td>log id</td>
                                                <td>time-planned</td>
                                                <td>start_dt</td>
                                                <td>fin_dt</td>
                                                <td>time_used</td>
                                                <td>stat</td>
                                                <td>user_test</td>
                                            </tr>
                                        </table>
                                        <br>
                                        <label id="lastedit" style="color: black"> Last Edited by: </label> <br>
                                        <label id="lasteditname" style="font-style: normal; font-weight: normal">date_name_id</label>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div id="button_section">
                                            <button type="submit" data-ng-click="postLog(diagnosis, findings, others, cause, EmpID, tno); postLog(diagnosis1, findings1, others1, cause1, EmpID, tno)">Submit</button>
                                            <button type="reset">Reset</button>
                                            <button type="button">Cancel</button>
                                        </div>
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

                <div class="modal fade" id="Modal">
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

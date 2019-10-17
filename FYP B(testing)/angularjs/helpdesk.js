/*jslint white:true */
/*global angular */
/*
 * Solution for error message: 'angular' was used before it was defined by JSlint
 *  http://stackoverflow.com/questions/31390428/error-angular-was-used-before-it-was-defined-but-online-editors-able-to-outpu
 *
 */
var app = angular.module("HelpdeskApp", ['ngRoute']);

app.controller('test', function ($scope) {
    "use strict";
    $scope.test = "Test";
});

app.config(function ($routeProvider) {
    "use strict";
    $routeProvider
        .when("/Open", {
            templateUrl: 'templates/tableOpen.php'
        })
        .when("/Overdue", {
            templateUrl: 'templates/tableOverdue.html'
        })
        .when("/Pending", {
            templateUrl: 'templates/tablePending.php'
        })
        .when("/Solved", {
            templateUrl: 'templates/tableSolved.php'
        })
        .when("/PersonalAll", {
            templateUrl: 'templates/tablePersonalAll.php'
        })
        .when("/All", {
            templateUrl: 'templates/tableAll.php'
        })
        .otherwise({
            redirectTo: '/'
        });
});

app.controller("getCtrl", function ($scope, $http) {
    'use strict';

    $http.get('api/getAllPersons.php')
        .then(
            function (response) {
                $scope.tickets = response.data;
                console.log(response.data);
            },
            function (response) {
                console.log(response.data);
                // error handling routine
            });
    
    
    $scope.init = function (obj) {
        $scope.tno = obj.ticketNo;
        $scope.title = obj.title;
        $scope.cust_desc = obj.desc;
        $scope.warran = obj.warranty;
        $scope.domainName = obj.domain;
        $scope.name = obj.Name;
    };
    
});


app.controller("putCtrl", function ($scope, $http) {
    // property initialisation

    $scope.Status = null;
    $scope.visible = false;
    // define methods

    $scope.empInit = function (Eid) {
        $scope.EmpID = Eid;
    };

    $scope.custInit = function (pid) {
        $scope.CustID = pid;
        //console.log(pid);
    };

    $scope.putData = function (TicketNo, EmpID) {
        // Prepare the data
        
        $scope.msg=alert("Ticket is successfully accepted!");
        var url = "api/updatePerson.php";
        $scope.refresh=location.reload();
        var data = $.param({
            TicketNo: TicketNo,
            EmpID: EmpID
        });
        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        //Call the services
        $http.put(url, data, config)
            .then(
                function (response) {
                    // depends on the data value
                    // there may be instances of put failure
                    if (response.data)
                        $scope.msg = response.data;
                },
                function (response) {
                    $scope.msg = "Service not Exists";
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers();
                });
    };
    
    $scope.postLog = function (Description, Diagnosis, findings, others, cause, UserID, ticketID, ticketStat) {
        // Prepare the data        
        $scope.msg=alert("Thank you! You have submitted the Log!");
        $scope.refresh=location.reload();
        var url = "api/insertHistoryLog.php",
            data = $.param({
                Description: Description,
                Diagnosis: Diagnosis,
                findings: findings,
                pid: UserID,
                others: others,
                cause: cause,
                ticketID: ticketID,
                ticketStat: ticketStat
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        
        //Call the services
        $http.post(url, data, config)
            .then(
                function (response) {
                    // depends on the data value
                    // there may be instances of put failure
                    if (response.data) {
                        
                        console.log(response.data);
                    }
                },
                function (response) {
                    $scope.msg = "Service not Exists";
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers();
                });
        
    };
});

app.controller("postCtrl", function ($scope, $http) {
    // property initialisation
    'use strict';
    $scope.TicketTitle = null;
    $scope.TicketDesc = null;
    $scope.warranty = null;
    $scope.domain = null;
    $scope.Status = null;
    $scope.diagnosis = null;
    $scope.findings = null;
    $scope.others = null;
    $scope.cause = null;

    $scope.userInit = function (uid) {
        $scope.UserID = uid;
        //console.log(uid);
    };

    $scope.roleInit = function (role) {
        $scope.role = role;
        //console.log(role);
    };

    // define methods
    $scope.postData = function (TicketTitle, TicketDesc, UserID, warranty, domain, Status) {
        // Prepare the data        
        $scope.msg=alert("Thank you! You have submitted the ticket!");
        $scope.redirect=window.location="Dashboard.php#Pending";
        var url = "api/insertPerson.php",
            data = $.param({
                TicketTitle: TicketTitle,
                TicketDesc: TicketDesc,
                UserID: UserID,
                warranty: warranty,
                domain: domain,
                Status: Status
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        
        //Call the services
        $http.post(url, data, config)
            .then(
                function (response) {
                    // depends on the data value
                    // there may be instances of put failure
                    if (response.data) {
                        $scope.msg = response.data;
                        console.log(response.data);
                    }
                },
                function (response) {
                    $scope.msg = "Service not Exists";
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers();
                });
    };
    
      // define methods
    $scope.searchName = function (pid) {
        // Prepare the data        
        var url = "api/getCustName.php",
            data = $.param({
                pid: pid
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        
        $http.post(url, data, config)
            .then(
                function (response) {
                    // depends on the data value
                    // there may be instances of put failure
                    if (response.data) {
                        $scope.CustName = response.data;
//                        console.log(response.data);
                    }
                },
                function (response) {
                    console.log("Service not Exists");
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers();
                });
    };
    
    $scope.getLog = function (pid, tNo) {
        // Prepare the data       
        var url0 = "api/getDescription.php",
            data = $.param({
                UserID: pid,
                tNo: tNo
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        
        $http.post(url0, data, config)
            .then(
                function (response) {
                    if (response.data) {
                        $scope.description = response.data;
                    }
                },
                function (response) {
                    console.log("Service not Exists");
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers;
                    console.log(response.data);
                });
        
        var url = "api/getDiagnosis.php",
            data = $.param({
                UserID: pid,
                tNo: tNo
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        
        $http.post(url, data, config)
            .then(
                function (response) {
                    if (response.data) {
                        $scope.diagnosis = response.data;
                    }
                },
                function (response) {
                    console.log("Service not Exists");
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers;
                    console.log(response.data);
                });
        
        var url1 = "api/getFindings.php",
            data = $.param({
                UserID: pid,
                tNo: tNo
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        
        $http.post(url1, data, config)
            .then(
                function (response) {
                    if (response.data) {
                        $scope.findings = response.data;
                        console.log(response.data);
                    }
                },
                function (response) {
                    console.log("Service not Exists");
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers;
                    console.log(response.data);
                });
        
        var url2 = "api/getOthers.php",
            data = $.param({
                UserID: pid,
                tNo: tNo
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        
        $http.post(url2, data, config)
            .then(
                function (response) {
                    if (response.data) {
                        $scope.others = response.data;
                        console.log(response.data);
                    }
                },
                function (response) {
                    console.log("Service not Exists");
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers;
                    console.log(response.data);
                });
        
        var url3 = "api/getCause.php",
            data = $.param({
                UserID: pid,
                tNo: tNo
            }),
            config = {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
        $http.post(url3, data, config)
            .then(
                function (response) {
                    if (response.data) {
                        $scope.cause = response.data;
                        console.log(response.data);
                    }
                },
                function (response) {
                    console.log("Service not Exists");
                    $scope.statusval = response.status;
                    $scope.statustext = response.statusText;
                    $scope.headers = response.headers;
                    console.log(response.data);
                });
    };
});

//table header sort
app.controller('sort', function ($scope, $location) {
    // Object
    // $scope.tic = [
    //  {ticketNo:1,title:'Yogesh Singh',desc:23,pid:'001',date:'12/1/215'},
    //  {ticketNo:2,title:'Sonarika Bhadoria',desc:23,pid:'002',date:'11/02/2014'},
    //  {ticketNo:3,title:'Vishal Sahu',desc:24,pid:'003',date:'1/12/2013'},
    //  {ticketNo:4,title:'Sanjay Singh',desc:22,pid:'004',date:'12/12/2013'}
    // ];

    // column to sort
    $scope.column = 'ticketNo';

    // sort ordering (Ascending or Descending). Set true for desending
    $scope.reverse = false;

    // called on header click
    $scope.sortColumn = function (col) {
        $scope.column = col;
        if ($scope.reverse) {
            $scope.reverse = false;
            $scope.reverseclass = 'arrow-up';
        } else {
            $scope.reverse = true;
            $scope.reverseclass = 'arrow-down';
        }
    };

    // remove and change class
    $scope.sortClass = function (col) {
        if ($scope.column == col) {
            if ($scope.reverse) {
                return 'arrow-down';
            } else {
                return 'arrow-up';
            }
        } else {
            return '';
        }
    }

    $scope.gotolink = function (ticket) {
        $location.path('#/ticket/' + tic.ticketNo);
    };

});


app.controller('chartCtrl', function ($scope) {

    //    Highcharts.chart('taskOverview', {
    //    title: {
    //        text: 'Performance'
    //    },
    //    xAxis: {
    //        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    //    },
    //    labels: {
    //        items: [{
    //            html: 'Total Personal Tasks',
    //            style: {
    //                left: '50px',
    //                top: '18px',
    //                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
    //            }
    //        }]
    //    },
    //    series: [{
    //        type: 'column',
    //        name: 'Solved',
    //        data: [3, 2, 1, 3, 4]
    //    }, {
    //        type: 'column',
    //        name: 'Pending',
    //        data: [2, 3, 5, 7, 6]
    //    }, {
    //        type: 'column',
    //        name: 'Overdue',
    //        data: [4, 3, 3, 9, 0]
    //    }, {
    //        type: 'spline',
    //        name: 'Average',
    //        data: [3, 2.67, 3, 6.33, 3.33],
    //        marker: {
    //            lineWidth: 2,
    //            lineColor: Highcharts.getOptions().colors[3],
    //            fillColor: 'white'
    //        }
    //    }, {
    //        type: 'pie',
    //        name: 'Total Task in past 7 days',
    //        data: [{
    //            name: 'Open',
    //            y: 13,
    //            color: Highcharts.getOptions().colors[0] 
    //        }, {
    //            name: 'Pending',
    //            y: 23,
    //            color: Highcharts.getOptions().colors[1] 
    //        }, {
    //            name: 'Solved',
    //            y: 19,
    //            color: Highcharts.getOptions().colors[2] 
    //        }],
    //        center: [100, 80],
    //        size: 100,
    //        showInLegend: false,
    //        dataLabels: {
    //            enabled: false
    //        }
    //    }]
    //});

    Highcharts.chart('spiderWeb', {

        chart: {
            polar: true,
            type: 'line'
        },

        title: {
            text: "Staff's Ability",
            x: -80
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: ['System Update', 'Plugin', 'Environment settings', 'Installation', 'Security', 'Administration'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
        },

        legend: {
            align: 'right',
            verticalAlign: 'middle'
        },

        series: [{
            name: 'Mark',
            data: [3, 6, 1, 3, 1, 7],
            pointPlacement: 'on'
        }, {
            name: 'Mike',
            data: [6, 3, 1, 1, 1, 1],
            pointPlacement: 'on'
        }, {
            name: 'John',
            data: [4, 3, 5, 1, 1, 3],
            pointPlacement: 'on'
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom'
                    },
                    pane: {
                        size: '70%'
                    }
                }
        }]
        }

    });

    Highcharts.chart('performance', {
        title: {
            text: 'Performance'
        },
        xAxis: {
            categories: ['Mark', 'Desmond', 'Mike', 'Lau', 'Jack']
        },
        labels: {
            items: [{
                html: 'Total Personal Tasks',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
        }]
        },
        series: [{
            type: 'column',
            name: 'Solved',
            data: [3, 2, 1, 3, 4]
    }, {
            type: 'column',
            name: 'Pending',
            data: [2, 3, 5, 7, 6]
    }, {
            type: 'column',
            name: 'Overdue',
            data: [4, 3, 3, 9, 0]
    }, {
            type: 'spline',
            name: 'Average',
            data: [3, 2.67, 3, 6.33, 3.33],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
    }, {
            type: 'pie',
            name: 'Total consumption',
            data: [{
                name: 'Solved',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
        }, {
                name: 'Pending',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
        }, {
                name: 'Overdue',
                y: 19,
                color: Highcharts.getOptions().colors[2] // Joe's color
        }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
    }]
    });




    //    Highcharts.chart('taskRecived', {
    //        chart: {
    //            zoomType: 'xy'
    //        },
    //        title: {
    //            text: 'Average Monthly Temperature and Rainfall in Tokyo'
    //        },
    //        subtitle: {
    //            text: 'Source: WorldClimate.com'
    //        },
    //        xAxis: [{
    //            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
    //      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    //            crosshair: true
    //  }],
    //        yAxis: [{ // Primary yAxis
    //            labels: {
    //                format: '{value}°C',
    //                style: {
    //                    color: Highcharts.getOptions().colors[1]
    //                }
    //            },
    //            title: {
    //                text: 'Temperature',
    //                style: {
    //                    color: Highcharts.getOptions().colors[1]
    //                }
    //            }
    //  }, { // Secondary yAxis
    //            title: {
    //                text: 'Rainfall',
    //                style: {
    //                    color: Highcharts.getOptions().colors[0]
    //                }
    //            },
    //            labels: {
    //                format: '{value} mm',
    //                style: {
    //                    color: Highcharts.getOptions().colors[0]
    //                }
    //            },
    //            opposite: true
    //  }],
    //        tooltip: {
    //            shared: true
    //        },
    //        legend: {
    //            layout: 'vertical',
    //            align: 'left',
    //            x: 120,
    //            verticalAlign: 'top',
    //            y: 100,
    //            floating: true,
    //            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    //        },
    //        series: [{
    //            name: 'Rainfall',
    //            type: 'column',
    //            yAxis: 1,
    //            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
    //            tooltip: {
    //                valueSuffix: ' mm'
    //            }
    //
    //  }, {
    //            name: 'Temperature',
    //            type: 'spline',
    //            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
    //            tooltip: {
    //                valueSuffix: '°C'
    //            }
    //  }]
    //    });





});

//#####################################################
app.controller('search', function ($scope) {

    //     var input, filter, table, tr, td, i, txtValue;
    //              input = $scope.getElementById("myInput");
    //              filter = input.value.toUpperCase();
    //              table = $scope.getElementById("open");
    //              tr = table.getElementsByTagName("tr");
    //                   
    //    
    //               $scope.myFunction=function() {
    //             
    //                   
    //              for (i = 0; i < tr.length; i++) {
    //                td = tr[i].getElementsByTagName("td")[0];
    //                if (td) {
    //                  txtValue = td.textContent || td.innerText;
    //                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //                    tr[i].style.display = "";
    //                  } else {
    //                    tr[i].style.display = "none";
    //                  }
    //                }       
    //              }
    //            }

    $scope.searchKeyword = {}
    $scope.SearchTerm = '$';

});
var expectFriendNames = function (expectedNames, key) {
    element.all(by.repeater(key + ' in ticket').column(key + '.ticketNo')).then(function (arr) {
        arr.forEach(function (wd, i) {
            expect(wd.getText()).toMatch(expectedNames[i]);
        });
    });
};

it('should search across all fields when filtering with a string', function () {
    var searchText = element(by.model('searchText'));
    searchText.clear();
    searchText.sendKeys('1');
    expectFriendNames(['1'], 'ticket');

    searchText.clear();
    searchText.sendKeys('p');
    expectFriendNames(['Pending'], 'ticket');
});

it('should search in specific fields when filtering with a predicate object', function () {
    var searchAny = element(by.model('search.$'));
    searchAny.clear();
    searchAny.sendKeys('n');
    expectFriendNames(['Pending', 'Open'], 'ticObj');
});

it('should use a equal comparison when comparator is true', function () {
    var searchName = element(by.model('search.name'));
    var strict = element(by.model('strict'));
    searchName.clear();
    searchName.sendKeys('Pending');
    strict.click();
    expectFriendNames(['Pending'], 'ticObj');
});

////////////////////////////////////////////////////

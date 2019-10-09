var app = angular.module('plunker', []);

app.controller('MainCtrl', function($scope) {

  $scope.updateTodo = function(value) {
    console.log('Saving title ' + value);
    alert('Saving title ' + value);
  };
  
  $scope.cancelEdit = function(value) {
    console.log('Canceled editing', value);
    alert('Canceled editing of ' + value);
  };
  
  $scope.todos = [
    {id:123, title: 'Lord of the things'}
  ];
});

app.controller("putCtrl", function ($scope, $http) {
    $scope.putPassword = function (Password,NewPassword) {
        // Prepare the data
        
        $scope.msg=alert("Password is successfully accepted!");
        var url = "api/updatePassword.php";
        /*$scope.refresh=location.reload();*/
        var data = $.param({
            Password: Password,
            NewPassword: NewPassword
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
                        {
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
});

// On esc event
app.directive('onEsc', function() {
  return function(scope, elm, attr) {
    elm.bind('keydown', function(e) {
      if (e.keyCode === 27) {
        scope.$apply(attr.onEsc);
      }
    });
  };
});

//// On enter event
//app.directive('onEnter', function() {
//  return function(scope, elm, attr) {
//    elm.bind('keypress', function(e) {
//      if (e.keyCode === 13) {
//        scope.$apply(attr.onEnter);
//      }
//    });
//  };
//});

// Inline edit directive
app.directive('inlineEdit', function($timeout) {
  return {
    scope: {
      model: '=inlineEdit',
      handleSave: '&onSave',
      handleCancel: '&onCancel'
    },
    link: function(scope, elm, attr) {
      var previousValue;
      
      scope.edit = function() {
        scope.editMode = true;
        previousValue = scope.model;
        
        $timeout(function() {
          elm.find('input')[0].focus();
        }, 0, false);
      };
      scope.save = function() {
        scope.editMode = false;
        scope.handleSave({value: scope.model});
      };
      scope.cancel = function() {
        scope.editMode = false;
        scope.model = previousValue;
        scope.handleCancel({value: scope.model});
      };
    },
    templateUrl: 'inline-edit.html'
  };
});

app.config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{|');
        $interpolateProvider.endSymbol('|}');
    }
);

app.controller('testController', function($scope){
	$scope.imageSource = ""
  $scope.fileNameChaged = function(element)
    {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            $scope.$apply(function()
            {
                $scope.imageSource = e.target.result;
            });
        }
        reader.readAsDataURL(element.files[0]);
    }
});

app.controller("postCtrl", function ($scope, $http) {
    // property initialisation
    'use strict';
    $scope.TicketTitle = null;
    $scope.TicketDesc = null;

    $scope.userInit = function (uid) {
        $scope.UserID = uid;
    };
    
    $scope.roleInit = function (role) {
        $scope.role = role;
        console.log(role);
    };
    
    // define methods
    $scope.postData = function (TicketTitle, TicketDesc, UserID) {
        // Prepare the data        
        var url = "api/insertPerson.php",
            data = $.param({
                TicketTitle: TicketTitle,
                TicketDesc: TicketDesc,
                UserID: UserID
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
                        //console.log(response.data);
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



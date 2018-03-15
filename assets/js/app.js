var app= angular.module('myDashboard',['ngRoute']);

app.config(function($routeProvider) {
  $routeProvider.when('/election',{
    templateUrl: '../evote.com/views/manage.php'
  }).when('/ballot',{
    templateUrl: '../evote.com/views/ballot.php'
  }).when('/',{
    templateUrl: '../evote.com/views/dashboard.php'
  }).otherwise({
    templateUrl: '404'
  })

});
app.controller('voteController', function($scope, $filter, $http) {
  $http.get('../evote.com/backend/candidate.json')
       .then(function(res){
          $scope.candidates = res.data;
        });
  $http.get('../evote.com/backend/title.json')
       .then(function(results){
         $scope.positions = results.data;
       })
});

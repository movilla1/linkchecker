var itemChecker = angular.module('itemChecker', [], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

itemChecker.controller('itemlist',function($scope, $http, ListDataService){
  $scope.LoadLinks = function(project,user) {
    $scope.ProjectName = project.title;
    $scope.ProjectURL = project.link;
    ListDataService.getItemData(project.id,user).then(function(result){
      $scope.ItemData = result.data;
    });
  }
  $scope.CheckAllLinks = function() {
    angular.forEach($scope.ItemData, function(val,idx) {
      $http.get("api/check_item?row_id="+val.id).then(function(res) {
        color = (res.data == '1') ? "green":"red";
        $scope.statuses[val.id] = {"background-color": color}
      })
    })
  }
  $scope.linkIsActive = function(rowid) {
    return $scope.statuses[rowid];
  }
});

itemChecker.$inject = ['$scope', 'ListDataService'];
itemChecker.factory('ListDataService', ['$http', '$q', function($http) {
  var factory = {
    getItemData: function(project,user) {
      var data = $http({
        method: 'GET',
        url: "api/list_item_json?project_id="+project+"&uid="+user
      });
      return data;
    }
  }
  return factory;
}]);

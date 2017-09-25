var itemChecker = angular.module('itemChecker', [], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

itemChecker.controller('itemlist',function($scope, ListDataService){
  $scope.LoadLinks = function(project,user) {
    $scope.ProjectName = project.title;
    $scope.ProjectURL = project.link;
    ListDataService.getItemData(project.id,user).then(function(result){
      $scope.ItemData = result.data;
      $scope.ItemData.forEach(function(curr,idx){
        ListDataService.checkStatus(curr).then(function(res){
          $scope.Statuses[curr.id]=res;
        });
      })
    });
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
    },
    checkStatus: function(row) {
      var page = $http({
        method: "GET",
        url: "api/check_item?row_id"+row.id
      });
      return page.data;
    }
  }
  return factory;
}]);
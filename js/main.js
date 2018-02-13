var app = angular.module("myApp", []);

app.controller('booking', function($scope ,$http) {
    $scope.booksuccess = false;
    $scope.book_load = false;
    $scope.read_only = false;
	$scope.book_service = function(input){
		$scope.book_load = true;
	    $scope.read_only = true;
		$http({
           method: 'POST',
           url: "bookrequest.php",
           data:input,
           }).then(function(result) {
   	  		  $scope.book_load = false;
	  		  $scope.read_only = false;
           	  $scope.booksuccess = true;
            }, function(error) {
			  $scope.book_load = false;
		      $scope.read_only = false;

       });
	}
});

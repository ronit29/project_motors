var app = angular.module("myApp", []);

app.controller('booking', function($scope ,$http) {

	$scope.book_service = function(input){
		$http({
           method: 'POST',
           url: "bookrequest.php",
           data:input,
           }).then(function(result) {
            }, function(error) {
       });
	}
});

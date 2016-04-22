<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div ng-app="myApp" ng-controller="customersCtrl">
<table border=1 >
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Rain</th> 
                        <th>Wind Speed</th>
                        <th>Barometric Presser</th>
                        <th>Wind Direction</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0; ?>
                    <tr class="gradeX" ng-repeat="x in names">
                    <?php $sl++; ?>
                        <td>{{$sl}}</td>
                        <td>{{ x.date }} </td>
                        <td>{{ x.time }} </td>
                        <td>{{x.temperature}} </td>
                        <td>{{x.humidity}} </td>
                        <td>{{x.rain}} </td>
                        <td>{{x.wind_speed}}</td>
                        <td>{{x.barometric_presser}}</td>
                        <td>{{x.wind_direction}}</td>
                    </tr>
                    </tbody>
                    </table>

</div>
 
<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
   $http.get("http://localhost/PastoralismBook/public/jsonData")
   .then(function (response) {$scope.names = response.data.records;});
});
</script>
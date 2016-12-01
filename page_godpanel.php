<?php
    session_start();
    error_reporting();    
?>
<html ng-app="AdbiApp">
    <head ng-controller="AdbiHeadController">
        <meta charset="UTF-8">
        <title>{{TitlePageBrowse}}</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
        <link rel="stylesheet" href="styles/st_page_browse.css">
        <link rel="stylesheet" href="styles/st_ads.css">
        <script src="scripts/adbi_master.js"></script>
        <script src="scripts/add_new_ad_type_changer.js"></script>
    </head>
    <body>
        <div class="container adbi_class_wholepage">
            <!--\/NAV\/-->
            <div class="row" ng-controller="AdbiNavbarController">
                <div class="col-md-12">
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="">{{Navp1}}</a>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{HrefNavp2}}">{{Navp2}}</a></li>
                                    <li><a href="{{HrefNavp3}}">{{Navp3}}</a></li>
                                    <li><a href="{{HrefNavp4}}">{{Navp4}}</a></li>
</div></div></div>
<div ng-app='godApp' ng-controller='godControl'>
<table class="table">
<thead>
	<tr>
	<th>ID</th>
	<th>Email</th>
	<th>Nick</th>
	<th>Hasło</th>
	<th>Imię</th>
	<th>Nazwisko</th>
	<th>Telefon</th>
	<th>Data urodzenia</th>
	</tr>
</thead>
<tbody>
	<tr ng-repeat="T_USERS in data">
	<td><span> {{T_USERS.u_id}} </span></td>
	<td> {{T_USERS.u_email}} </td>
	<td> {{T_USERS.u_nick}} </td>	
	<td> {{T_USERS.u_password}} </td>	
	<td> {{T_USERS.u_name}} </td>
	<td> {{T_USERS.u_forename}} </td>	
	<td> {{T_USERS.u_phone}} </td>	
	<td> {{T_USERS.u_birth}} </td>
	<td><button ng-click="deleteUser(T_USERS.u_id)" title="Delete">Usuń użytkownika</button></td>
	</tr>
</tbody>
</table>
</div>
<script>
var app=angular.module('godApp',[]);
app.controller('godControl', function($scope,$http){

	$http.get("godstuff/f_show.php")
		.success(function(data){
			$scope.data=data
		})
	}

	$scope.displayStud=function(){
		$http.get("godstuff/f_show.php")
		.success(function(data){
			$scope.data=data
			$scope.displayStud();
		})
	}
	$scope.deleteUser=function(u_id){
		$http.post("godstuff/f_delete.php",{'u_id':u_id})
		.success(function(){
				$scope.msg="Pomyślnie usunięto";
				$scope.displayUser();


		})

	}
});
</script>


    </body>
</html>

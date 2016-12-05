<?php
    session_start();
    error_reporting();    
?>
<html ng-app="AdbiApp">
    <head ng-controller="AdbiHeadController">
        <meta charset="UTF-8">
        <title>{{TitleIndex}}</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
        <script src="scripts/adbi_master.js"></script>
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
                                    <li class="active"><a href="{{HrefNavp2}}">{{Navp2}}</a></li>
                                    <li><a href="{{HrefNavp3}}">{{Navp3}}</a></li>
                                    <li><a href="{{HrefNavp4}}">{{Navp4}}</a></li>
                                    <?php
                                        if ($_SESSION['userverificationkey']){
                                            echo '<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['u_nick'].'<img src='.$_SESSION['u_avatar'].' class="adbiavatar" alt="{{Nick}}"><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{HrefMyProfil}}'.$_SESSION['u_id'].'">{{MyProfil}}</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{HrefMyAccount}}">{{MyAccount}}</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{HrefLogout}}">{{Logout}}</a></li>
                                        </ul>
                                    </li>';
                                        }
                                        else{
                                            echo '<li><a href="{{HrefRegister}}">{{Register}}</a></li>';
                                            echo '<li><a href="{{HrefLogin}}">{{Login}}</a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!--/\NAV/\-->
<?php
include 'config/serverconfig.php';
$query = mysqli_query($con,'SELECT * FROM T_USERS ORDER BY u_id');
?>
            <table class="table">
        <thead>
	<tr>
	<th>ID</th>
	<th>Email</th>
	<th>Nick</th>
	<th>Imię</th>
	<th>Nazwisko</th>
	<th>Telefon</th>
	<th>Data urodzenia</th>
	<th>Data dołączenia</th>
	<th>Avatar</th>
	<th>Stopień</th>
	<th>Awansuj / Degraduj</th>
	<th>Treści +18</th>
	<th>Usuń użytkownika</th>
	</tr>
</thead>
<tbody><?php 
	while ($row = mysqli_fetch_array($query, MYSQL_BOTH)){
	echo '<tr>
	<td><span>'.$row['u_id'].'</span></td>
	<td>'.$row['u_email'].'</td>
	<td>'.$row['u_nick'].'</td>	
	<td>'.$row['u_name'].'</td>	
	<td>'.$row['u_forename'].'</td>
	<td>'.$row['u_phone'].'</td>	
	<td>'.$row['u_birth'].'</td>
	<td>'.$row['u_date'].'</td>
	<td>'.$row['u_avatar'].'</td>	
	<td>'.$row['u_god'].'</td>
	<td><a href="f_grantbadge.php?u_id='.$row['u_id'].'&u_god='.$row['u_god'].'"><span class="glyphicon glyphicon-plus"></span></a> / 
	<a href="f_retakebadge.php?u_id='.$row['u_id'].'&u_god='.$row['u_god'].'"><span class="glyphicon glyphicon-minus"></span></a></td>
	<td>'.$row['is_adult'].'</td>
	<td><a href="f_userdelete.php?u_id='.$row['u_id'].'&u_god='.$row['u_god'].'"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr>';
	}
	?>
</tbody>
</table>


    </body>
</html>

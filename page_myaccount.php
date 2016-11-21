<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['userverificationkey']){
        header('location: oszust.html');
    }
?>
<html>
    <head ng-controller="AdbiHeadController">
        <meta charset="UTF-8">
        <title>{{TitlePageMyAccount}}</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles/bootstrap.css">
        <link rel="stylesheet" href="styles/bootstrap-theme.css">
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
		<script type="text/javascript" src="scripts/register_validation.js"></script>
        <link rel="stylesheet" href="styles/registerinvalidfields.css">
        <link rel="stylesheet" href="styles/st_page_myaccount.css">
        <script src="scripts/adbi_master.js"></script>
        <script src="scripts/my_account_data_editor.js"></script>
    </head>
    <body ng-app="AdbiApp">
        <div class="container adbi_class_wholepage">
            <!--\/NAV\/-->
            <div class="row" ng-controller="AdbiNavbarController">
                <div class="col-md-12">
                    <nav class="navbar navbar-inverse navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="">{{navp1}}</a>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">{{navp2}}</a></li>
                                    <li><a href="" target="_blank">{{navp3}}</a></li>
                                    <li><a href="" target="_blank">{{navp4}}</a></li>
                                    <?php
                                        if ($_SESSION['userverificationkey']){
                                            echo '<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['u_nick'].'<img src='.$_SESSION['u_avatar'].' class="adbiavatar" alt="{{Nick}}"><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="">{{MyAds}}</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="page_myaccount.php">{{MyAccount}}</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="f_logout.php">{{Logout}}</a></li>
                                        </ul>
                                    </li>';
                                        }
                                        else{
                                            echo '<li><a href="page_register.html">Załóż konto</a></li>';
                                            echo '<li><a href="page_login.html">Zaloguj się</a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!--/\NAV/\-->
            <div class="row" ng-controller="AdbiUserFormController">
                <div class="col-md-3" style='background-color: yellow'>
                    Informacje osobowe i prywatność:<br>
                </div>
                <div class="col-md-6" style='background-color: lightgreen'>
                    <table>
                        <tr>
                            <td>{{Email}}</td>						
								<td><div id="A1-div-p"><?php echo($_SESSION['u_email']);?></div>							
							<div id="A1-div">
								<input type="text" id="fu_email" name="fu_email" value="<?php echo($_SESSION['u_email']);?>" required>
								<span class="komentarz"></span><br><br><br><br>
							</div>
							</td>
                            <td><a id="A1" ng-click="toggle = !toggle">{{toggleText}}</a></td>
                        </tr>
                        <tr>
                            <td>{{Nick}}</td>
							<div>
								<td><?php echo($_SESSION['u_nick']);?>
							</div>
							<div id="A2-div">
								<input type="text" id="fu_nick" name="fu_nick" value="<?php echo($_SESSION['u_nick']);?>" required>
								<span class="komentarz"></span><br><br>
							</div>
							</td>
                            <td><a id="A2">{{Edit}}</a></td>
                        </tr>
                        <tr>
                            <td>{{Password}}</td>
							<div>
								<td><?php echo($_SESSION['u_password']);?>
							</div>
							<div id="A3-div">
								<input type="text" name="fu_password" value="<?php echo($_SESSION['u_password']);?>" required>
								<span class="komentarz"></span><br><br>
							</div>
							</td>
                            <td><a id="A3">{{Edit}}</a></td>
                        </tr>
                        <tr>
                            <td>{{Name}}</td>
							<div>
								<td><?php echo($_SESSION['u_name']);?>
							</div>
							<div id="A4-div">
								<input type="text" name="rpassword" value="<?php echo($_SESSION['u_name']);?>" required>
								<span class="komentarz"></span><br><br>
							</div>
							</td>
                            <td><a id="A4">{{Edit}}</a></td>
                        </tr>
                        <tr>
                            <td>{{Forename}}</td>
							<div>
								<td><?php echo($_SESSION['u_forename']);?>
							</div>
							<div id="A5-div">
								<input type="text" id="fu_name" name="fu_name" value="<?php echo($_SESSION['u_forename']);?>" required>
								<span class="komentarz"></span><br><br>
							</div>
							</td>
                            <td><a id="A5">{{Edit}}</a></td>
                        </tr>
                        <tr>
                            <td>{{Phone}}</td>
							<div>
								<td><?php echo($_SESSION['u_phone']);?>
							</div>
							<div id="A6-div">
								<input type="text" id="fu_forename" name="fu_forename" value="<?php echo($_SESSION['u_phone']);?>" required>
								<span class="komentarz"></span><br><br>
							</div>
							</td>
                            <td><a id="A6">{{Edit}}</a></td>
                        </tr>
                        <tr>
                            <td>{{Birth}}</td>
							<div>
								<td><?php echo($_SESSION['u_birth']);?></div>
							<div id="A7-div">
								<input type="text" id="fu_birth" name="fu_birth" value="<?php echo($_SESSION['u_birth']);?>" required>
								<span class="komentarz"></span><br><br>
							</div>
							</td>
                            <td><a id="A7">{{Edit}}</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3" style='background-color: yellow'>
                    <div>
                        <td>{{Avatar}}</td>
                        <img src='<?php echo ($_SESSION['u_avatar']);?>' class="adbiavatarthumb" alt="{{Avatar}}">
                    </div>
                    <div>
                        {{Change}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style='background-color: lightsalmon'>
                    test<br>
                    test<br>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </body>
</html>
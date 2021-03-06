<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['userverificationkey']){
        header('location: page_login.php?pleaselogintoview');
    }
?>
<html ng-app="AdbiApp">
    <head ng-controller="AdbiHeadController">
        <meta charset="UTF-8">
        <title>{{TitlePageMyAccount}}</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
	<script type="text/javascript" src="scripts/register_validation.js"></script>
        <link rel="stylesheet" href="styles/registerinvalidfields.css">
        <link rel="stylesheet" href="styles/st_page_myaccount.css">
        <script src="scripts/adbi_master.js"></script>
        <script src="scripts/my_account_data_editor.js"></script>
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
            <div class="row" ng-controller="AdbiUserFormController">
                <div class="col-md-3">
                    Informacje osobowe i prywatność:<br>
                </div>
                <div class="col-md-6">
                    <form action="f_updatedata.php" method="POST">
                    <table>
                        <tr>
                            <td>{{Email}}</td>					
                            <td>
                                <div class="second_child_td"><?php echo($_SESSION['u_email']);?></div>
				<div id="A1_div">
                                    <input type="text" id="fu_email" name="fu_email" value="<?php echo($_SESSION['u_email']);?>" required>
                                    <span class="komentarz" style="width: 100%"></span><br><br>
				</div>
                            </td>
                            <td><a id="A1" ng-click="EditSaveToggle1 = !EditSaveToggle1" {{CleverSender}}><span class="{{ESToggle1}}"></span></a></td>
                        </tr>
                        <tr>
                            <td>{{Nick}}</td>
                            <td>
                                <div class="second_child_td"><?php echo($_SESSION['u_nick']);?></div>
				<div id="A2_div">
                                    <input type="text" id="fu_nick" name="fu_nick" value="<?php echo($_SESSION['u_nick']);?>" required>
                                    <span class="komentarz" style="width: 100%"></span><br><br>
				</div>
                            </td>
                        <td><a id="A2" ng-click="EditSaveToggle2 = !EditSaveToggle2"><span class="{{ESToggle2}}"></span></a></td>
                        </tr>
                        <tr>
                            <td>{{Password}}</td>
                            <td>
                                <div class="second_child_td"><?php echo'*******';?></div>
                                <div id="A3_div">
                                    <input type="password" name="fu_password" value="<?php echo($_SESSION['u_password']);?>" required>
                                    <span class="komentarz" style="width: 100%"></span><br><br>
				</div>
                            </td>
                            <td><a id="A3" ng-click="EditSaveToggle3 = !EditSaveToggle3"><span class="{{ESToggle3}}"></span></a></td>
                        </tr>
                        <tr>
                            <td>{{Name}}</td>
                            <td>
                                <div class="second_child_td"><?php echo($_SESSION['u_name']);?></div>
                                <div id="A4_div">
                                    <input type="text" id="fu_name" name="fu_name" value="<?php echo($_SESSION['u_name']);?>" required>
                                    <span class="komentarz" style="width: 100%"></span><br><br>
				</div>
                            </td>
                            <td><a id="A4" ng-click="EditSaveToggle4 = !EditSaveToggle4"><span class="{{ESToggle4}}"></span></a></td>
                        </tr>
                        <tr>
                            <td>{{Forename}}</td>
                            <td>
                                <div class="second_child_td"><?php echo($_SESSION['u_forename']);?></div>
				<div id="A5_div">
                                    <input type="text" id="fu_forename" name="fu_forename" value="<?php echo($_SESSION['u_forename']);?>" required>
                                    <span class="komentarz" style="width: 100%"></span><br><br>
				</div>
                            </td>
                            <td><a id="A5" ng-click="EditSaveToggle5 = !EditSaveToggle5"><span class="{{ESToggle5}}"></span></a></td>
                        </tr>
                        <tr>
                            <td>{{Phone}}</td>
                            <td>
                                <div class="second_child_td"><?php echo($_SESSION['u_phone']);?></div>
				<div id="A6_div">
                                    <input type="text" id="fu_phone" name="fu_phone" value="<?php echo($_SESSION['u_phone']);?>" required>
                                    <span class="komentarz" style="width: 100%"></span><br><br>
				</div>
                            </td>
                            <td><a id="A6" ng-click="EditSaveToggle6 = !EditSaveToggle6"><span class="{{ESToggle6}}"></span></a></td>
                        </tr>
                        <tr>
                            <td>{{Birth}}</td>
                            <td>
                                <div class="second_child_td"><?php echo($_SESSION['u_birth']);?></div>
				<div id="A7_div">
                                    <input type="text" id="fu_birth" name="fu_birth" value="<?php echo($_SESSION['u_birth']);?>" required>
                                    <span class="komentarz" style="width: 100%"></span><br><br>
				</div>
                            </td>
                            <td><a id="A7" ng-click="EditSaveToggle7 = !EditSaveToggle7"><span class="{{ESToggle7}}"></span></a></td>
                        </tr>
                    </table><br>
                    <input type="submit" name="formsend" class="btn btn-danger" value="Zapisz zmiany" style="float: right">
                    </form>
                </div>
                <div class="col-md-3">
                    <div>
                        <td>{{Avatar}}</td>
                        <img src='<?php echo ($_SESSION['u_avatar']);?>' class="adbiavatarthumb" alt="{{Avatar}}">
                    </div>
                    <div>
                        <form action='f_changephoto.php' method='POST' enctype="multipart/form-data">
                            <input type="file" name="fu_avatar" id="fu_avatar" accept='image/*' class="inputfile inputfile-1" class="btn btn btn-info">
                            <label for="fu_avatar" class="adbi_fileupload-btn btn btn-info">
                                <span>Wybierz plik</span>
                            </label>
                            <script src="scripts/uploadbutton.js"></script>
                            <br>
                            <input class="btn btn-success" type='submit' name='fchange' value='{{Change}}'>
			</form>
                    </div>
                    <div>
                        <?php
                            if($_SESSION['is_adult']==0){
                                echo '<a href="f_isadultchanger.php"><button id="IsNotAdultYet" class="btn btn-danger"><span>Nie widzisz treśći 18+ ;-;</span></button></a>';
                            }
                            if($_SESSION['is_adult']==1){
                                echo '<a href="f_isadultchanger.php"><button id="IsAdult" class="btn btn-danger"><span>Widzisz treści 18+ *,*</span></button></a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
    </body>
</html>

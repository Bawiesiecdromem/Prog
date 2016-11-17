<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['userverificationkey']){
        header('location: oszust.html');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ADBI</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles/bootstrap.css">
        <link rel="stylesheet" href="styles/bootstrap-theme.css">
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
        <link rel="stylesheet" href="styles/st_page_myaccount.css">
        <script src="scripts/adbi_master.js"></script>
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
                    <?php
                    echo "
                    <table>
                        <tr>
                            <td>{{Email}}</td>
                            <td>".$_SESSION['u_email']."</td>
                            <td>Edytuj</td>
                        </tr>
                        <tr>
                            <td>{{Nick}}</td>
                            <td>".$_SESSION['u_nick']."</td>
                            <td>Edytuj</td>
                        </tr>
                        <tr>
                            <td>{{Password}}</td>
                            <td>".$_SESSION['u_password']."</td>
                            <td>Edytuj</td>
                        </tr>
                        <tr>
                            <td>{{Name}}</td>
                            <td>".$_SESSION['u_name']."</td>
                            <td>Edytuj</td>
                        </tr>
                        <tr>
                            <td>{{Forename}}</td>
                            <td>".$_SESSION['u_forename']."</td>
                            <td>Edytuj</td>
                        </tr>
                        <tr>
                            <td>{{Phone}}</td>
                            <td>".$_SESSION['u_phone']."</td>
                            <td>Edytuj</td>
                        </tr>
                        <tr>
                            <td>{{Birth}}</td>
                            <td>".$_SESSION['u_birth']."</td>
                            <td>Edytuj</td>
                        </tr>
                    </table>
                    ";
                    ?>
                </div>
                <div class="col-md-3" style='background-color: yellow'>
                    test<br>
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
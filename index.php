<?php
    session_start();
    error_reporting(0);
    include 'f_frozead.php';
    $limitofcomments=1;
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
        <link rel="stylesheet" href="styles/st_ads.css">
        <link rel="stylesheet" href="styles/st_adcharlimiter.css">
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
            <div class="row" ng-controller="AdbiController">
                <div class="col-md-1">

                </div>
                <div class="col-md-3">
                    {{WIP}}
                </div>
                <div class="col-md-4">
                    <a href="page_users.php?id=1"><h1>{{greeting}}</h1></a>
                </div>
                <div class="col-md-3">
                    <?php 
                        if ($_SESSION['u_god']){
                            echo '<a href="page_godpanel.php">{{WelcomeInHeaven}}</a>';
                        }
                    ?>
                </div>
                <div class="col-md-1">

                </div>
            </div>
            <div class="row">
                <p class="adbiseparator"></p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if ($_SESSION['u_email']){
                            echo "Witaj, ".$_SESSION['u_nick']."!";
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div>
                        <nav>
                            <ul class="nav nav-stacked">
                                <h3>Kategorie</h3>
                                <li><a href="?cat_id=0">Wszystkie</a></li>
                                <?php 
                                    include 'f_displaycategories.php';
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php
                        include 'config/serverconfig.php';
                        if($_SESSION['userverificationkey']){
                            $ads_query = mysqli_query($con,"SELECT * FROM T_AD INNER JOIN T_USERS LEFT JOIN T_ACTIONS ON T_AD.u_id=T_USERS.u_id=T_ACTIONS.action_who ORDER BY ad_date desc") or die ('nie');
                            while($row = mysqli_fetch_array($ads_query)){
                                if($_GET['cat_id'] == 0){
                                    if($row['action_whoisfollowed'] == $row['u_id']){
                                        include 'f_displayads.php';
                                    }
                                }
                                if($_GET['cat_id'] == $row['cat_id']){
                                    if($row['action_whoisfollowed'] == $row['u_id']){
                                        include 'f_displayads.php';
                                    }
                                }
                            }
                        }
                        else{
                            $ads_query = mysqli_query($con,"SELECT * FROM T_AD INNER JOIN T_USERS ON T_AD.u_id=T_USERS.u_id ORDER BY ad_date desc") or die ('nie');
                            while($row = mysqli_fetch_array($ads_query)){
                                if($_GET['cat_id'] == 0){
                                    include 'f_displayads.php';
                                }
                                if($_GET['cat_id'] == $row['cat_id']){
                                    include 'f_displayads.php';
                                }
                            }
                        }
                    ?>
                </div>
                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
    </body>
</html>
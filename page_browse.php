<?php
    session_start();
    error_reporting(0);    
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
                                <a class="navbar-brand" href="">{{navp1}}</a>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">{{navp2}}</a></li>
                                    <li class="active"><a href="" target="_blank">{{navp3}}</a></li>
                                    <li><a href="page_addnewad.php">{{navp4}}</a></li>
                                    <?php
                                        if ($_SESSION['userverificationkey']){
                                            echo '<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['u_nick'].'<img src='.$_SESSION['u_avatar'].' class="adbiavatar" alt="{{Nick}}"><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="page_users.php?u_id='.$_SESSION['u_id'].'">{{MyProfil}}</a></li>
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
            <div class="row">
                <p class="adbiseparator"></p>
            </div>
            <div class="row" ng-controller="AdbiPageBrowse">
                <div id="BrowseHeader" class="col-md-12">
                    <h4>{{BrowseAds}}</h4>
                    <p class="adbiseparator"></p>
                    <p class="adbiseparator-md"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-8">
                    <?php
                        $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
                               mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
                        $ads_query = mysql_query("SELECT * FROM T_AD JOIN T_USERS ON T_AD.u_id=T_USERS.u_id ORDER BY ad_date desc") or die ('nie');
                        while($row = mysql_fetch_array($ads_query)){
                        echo 
                            '
                            <div class="Ad-Container">
                                <div class="Ad-Head">
                                    <a href="page_users.php?u_id='.$row['u_id'].'"><h5><img src='.$row['u_avatar'].' class="AdAuthorAvatar">'.$row['u_nick'].'</h5></a>
                                </div>
                                <div class="Ad-Content">
                            ';
                        if($row['cat_id']==1){
                            echo
                                '
                                    <div class="Ad-C-Post">
                                        '.$row['ad_desc'].'<br>
                                    </div>
                                ';
                        }
                        if($row['cat_id']==2){
                            if($row['ad_photo']){
                                echo 
                                '
                                        <div>
                                            <img src='.$row['ad_photo'].' class="Ad-C-Photo">
                                        </div>
                                ';
                            }
                        }
                        if($row['cat_id']>2){
                            echo 'OGŁOSZENIE';
                        }
                        echo
                            '
                                </div>
                                <div class="Ad-Bottom">
                                    '.'
                                </div>
                                <p class="adbiseparator"></p>
                            </div>
                            ';
                        }
                    ?>
                </div>
                <div class="col-md-2">
                    
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
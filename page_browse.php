<?php
    session_start();
    error_reporting(0);    
    include 'f_frozead.php';
    $limitofcomments=1;
    include 'f_searchmodule.php';
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
        <link rel="stylesheet" href="styles/st_adcharlimiter.css">
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
                                    <li class="active"><a href="{{HrefNavp3}}">{{Navp3}}</a></li>
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
            <div class="row">
                <p class="adbiseparator"></p>
            </div>
            <div class="row" ng-controller="AdbiPageBrowse">
                <div id="BrowseHeader" class="col-md-12">
                    <h3>{{BrowseAds}}</h3>
                    <p class="adbiseparator"></p>
                    <p class="adbiseparator-md"></p>
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
                        if($providesearch>0){
                            $ads_query = mysqli_query($con,"SELECT * FROM T_AD INNER JOIN T_USERS ON T_AD.u_id=T_USERS.u_id WHERE ((T_AD.ad_title LIKE '%$searchstring%') OR (T_AD.ad_desc LIKE '%$searchstring%')) ORDER BY ad_date desc") or die ('nie');
                        }
                        else{
                            $ads_query = mysqli_query($con,"SELECT * FROM T_AD INNER JOIN T_USERS ON T_AD.u_id=T_USERS.u_id ORDER BY ad_date desc") or die ('nie');
                        }
                        while($row = mysqli_fetch_array($ads_query)){
                            if($_GET['cat_id'] == 0){
                                include 'f_displayads.php';
                            }
                            if($_GET['cat_id'] == $row['cat_id']){
                                include 'f_displayads.php';
                            }
                        }
                    ?>
                </div>
                <div class="col-md-2">
                    <br>
                    <form action="" method="POST">
                        <input class="form-control" type="text" name="searchstring" maxlength="255" placeholder="Szukana fraza...">
                        <input type="submit" name="search" value="Szukaj" class="btn btn-danger"><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

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
                    
                </div>
                <div class="col-md-8">
                    <?php
                        $con = mysqli_connect('localhost','root','','ADBI_DB') or die ('Nie można nawiązać połączenia');
                        $ads_query = mysqli_query($con,"SELECT * FROM T_AD INNER JOIN T_USERS ON T_AD.u_id=T_USERS.u_id ORDER BY ad_date desc") or die ('nie');
                        while($row = mysqli_fetch_array($ads_query)){
                        echo 
                            '
                            <div class="Ad-Container">
                                <p class="adbiseparator"></p>
                                <div class="Ad-Head">
                                    <table><td class="Ad-InfoTd"><a href="page_users.php?u_id='.$row['u_id'].'"><h4><img src='.$row['u_avatar'].' class="AdAuthorAvatar">'.$row['u_nick'].'</h4></a></td>'; if($_SESSION['u_id']==$row['u_id']||($_SESSION['u_god']>0&&$_SESSION['u_god']>=$row['u_god'])){echo '<td class="Ad-DeleteTd"><h4><a href="f_deletead.php?ad_id='.$row['ad_id'].'"><span class="glyphicon glyphicon-remove"></span></a></h4></td>';} echo'</table>
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
                            ';
                        $comms_query = mysqli_query($con,"SELECT T_C.*, T_U.* FROM T_COMMENTS AS T_C JOIN T_USERS AS T_U ON T_C.u_id = T_U.u_id WHERE T_C.ad_id =".$row['ad_id']." ORDER BY comm_date desc") or die ('nie');
                        while($comm_row = mysqli_fetch_array($comms_query)){
                            echo
                            '
                                <div class="Ad-Comms"><span class="Ad-Comm-Nick">'.$comm_row['u_nick'].':</span> '.$comm_row['comm_desc'].'';if($_SESSION['u_id']==$comm_row['u_id']||($_SESSION['u_god']>0&&$_SESSION['u_god']>=$comm_row['u_god'])){echo '<a href="f_deletecomm.php?comm_id='.$comm_row['comm_id'].'"><span class="glyphicon glyphicon-remove"></span></a>';} echo'</div>
                            ';
                        }
                        if ($_SESSION['userverificationkey']){
                            echo
                            '
                                    <form action="f_addnewcomm.php?ad_id='.$row['ad_id'].'" method="POST" enctype="multipart/form-data">
                                        <input class="form-control" type="text" name="comm_desc" maxlength="255" placeholder="Napisz komentarz..."><input type="submit" name="formsend" value="Opublikuj" class="btn btn-danger">
                                    </form>
                                </div>
                                <p class="adbiseparator"></p>
                            </div>
                            ';
                        }
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
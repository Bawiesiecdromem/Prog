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
        <title>{{TitlePageAddNewAd}}</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
        <link rel="stylesheet" href="styles/st_page_addnewad.css">
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
                                <a class="navbar-brand" href="{{HrefNavp1}}">{{Navp1}}</a>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{HrefNavp2}}">{{Navp2}}</a></li>
                                    <li><a href="{{HrefNavp3}}">{{Navp3}}</a></li>
                                    <li class="active"><a href="{{HrefNavp4}}">{{Navp4}}</a></li>
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
                <div class="col-md-2" ng-controller="AdbiNewAdController">
                    <div id="ToTs">
                        <h4 id="ToT">{{TypeOfTypes}}</h4><br>
                        <span><a id="T1">{{Type1}} <span id="T1s" class="glyphicon glyphicon-chevron-right"></span></a></span><br>
                        <span><a id="T2">{{Type2}} <span id="T2s" class="glyphicon glyphicon-chevron-right"></span></a></span><br>
                        <span><a id="T3">{{Type3}} <span id="T3s" class="glyphicon glyphicon-chevron-right"></span></a></span><br>
                    </div>
                </div>
                <div id="forms" class="col-md-10">
                    <div id='T1_div'>
                        <form action='f_addnewad.php' method='POST' enctype='multipart/form-data'>
                            <br><textarea class='form-control' type='text' name='fad_desc' value='fad_desc' maxlength='254' placeholder='Treść'></textarea>
                            <br><input type="submit" name="formsend1" value="Opublikuj" class='btn btn-danger'>
                        </form>
                    </div>
                    <div id='T2_div'>
                        T2
                    </div>
                    <div id='T3_div'>
                        <form action='f_addnewad.php' method='POST' enctype='multipart/form-data'>
                            <input class='form-control' type='text' name='fad_title' placeholder='Tytuł'></br>
                            <textarea class='form-control' rows='7' type='text' name='fad_desc' value='fad_desc' maxlength='254' placeholder='Treść'></textarea>
                            Dodaj zdjęcie: <input type='file' accept='image/*' name='fad_photo' id='fad_photo'>
                            <input type="checkbox" name="fmature_content"> +18<br>
                            <select class="form-control" name='fcat_id' id="fcat_id">
                                <option value="3c">Motoryzacja</option>
                                <option value="4c">Elektronikia</option>
                                <option value="5c">Nieruchomości</option>
                                <option value="6c">Moda</option>
                                <option value="7c">Sport i hobby</option>
                                <option value="8c">Praca</option>
                                <option value="9c">Rolnictwo</option>
                                <option value="10c">Edukacja</option>
                                <option value="11c">Muzyka</option>
                                <option value="12c">Dom i ogród</option>
                                <option value="13c">Zwierzęta</option>
                            </select><br>
                            <input type="submit" name="formsend3" value="Opublikuj" class='btn btn-danger'>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <p class="adbiseparator"></p>
            </div>
            <div class="row" ng-controller="AdbiNewAdController">
                <div id="MyAdsHeader" class="col-md-12">
                    <h4>{{MyAds}}</h4>
                    <p class="adbiseparator"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-8" style="background-color: #ec7ebd;">
                    <?php
                        $con = mysql_connect('localhost','root','') or die ('Nie można nawiązać połączenia');
                               mysql_select_db('ADBI_DB',$con) or die ('Nie znaleziono bazy');
                        $q = mysql_query("SELECT * FROM T_AD WHERE u_id = ".$_SESSION['u_id']." ORDER BY ad_date desc") or die ('nie');
                        while($pole = mysql_fetch_array($q)){
                        echo "<div>".$pole['ad_title']."</div></br>";
                        echo "<div> Autor: ".$_SESSION['u_nick']." Zwany: ".$_SESSION['u_name']."</div>";
                        echo "<div> Data dodania: ".$pole['ad_date']."</div></br>";
                        echo "<div>".$pole['ad_desc']."</br></br></div>";
                        //if($pole['ad_photo']){
                        //echo "<img src='/pics/".$pole['ad_photo']."'></br></img></br> </div></br>";
                        //}
                        //else
                        //echo "</div></br>";
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
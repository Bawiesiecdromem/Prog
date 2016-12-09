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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"><!-- plik stylów dla jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
        <link rel="stylesheet" href="styles/st_page_addnewad.css">
        <link rel="stylesheet" href="styles/st_ads.css">
        <script src="scripts/adbi_master.js"></script>
        <script src="scripts/add_new_ad_type_changer.js"></script>
        <link rel="stylesheet" href="../dist/rangeSlider.css">
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
                        <form action="f_addnewad.php" method="POST" enctype="multipart/form-data">
                            <br><textarea class="Ad-PostBox form-control" contenteditable="true" type="text" name="fad_desc" value="fad_desc" maxlength="255" placeholder="Treść"></textarea>
                            <br><br><input type="submit" name="formsend1" value="Opublikuj" class="btn btn-danger">
                        </form>
                    </div>
                    <div id='T2_div'>
                        <form action='f_addnewad.php' method='POST' enctype='multipart/form-data'>
                            <input type="file" name="fad_photo" id="fad_photo" accept='image/*' class="inputfile inputfile-1" class="btn btn btn-info">
                            <label for="fad_photo" class="adbi_fileupload-btn btn btn-info">
                                <span>Wybierz zdjęcie</span>
                            </label>
                            <script src="scripts/uploadfilebutton.js"></script><br>
                            <input type="checkbox" name="fmature_content"> +18 <?php if($_SESSION['is_adult']==0){echo 'Jeśli musisz już umieścić taki post to przynajmniej nie psuj zabawy innym (zobaczysz ten post na swoim profilu) PS. jako osoba niepełnoletnia łamiesz prawo i robisz to na własną odpowiedzialność.';} ?><br>
                            <br>  
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            <div id="slider-range-min"></div>
                            <script>
                            $( function() {
                                $( "#slider-range-min" ).slider({
                                    range: "min",
                                    value: 1,
                                    min: 1,
                                    max: 30,
                                    slide: function( event, ui ) {
                                        $( "#amount" ).val( "Ustaw na: " + ui.value + " dni");
                                        $('#hiddenSlider').val(ui.value);
                                    }
                                });
                                $( "#amount" ).val( "Domyślnie: " + $( "#slider-range-min" ).slider( "value" ) + " dzień");
                            });
                            </script>
                            <input type="hidden" id="hiddenSlider" name="slider">
                            <br><input type="submit" name="formsend2" value="Opublikuj" class="btn btn-danger">
                        </form>
                    </div>
                    <div id='T3_div'>
                        <form action='f_addnewad.php' method='POST' enctype='multipart/form-data'>
                            <input class='form-control' type='text' name='fad_title' maxlength='48' placeholder='Tytuł'></br>
                            <textarea class='form-control' rows='7' type='text' name='fad_desc' value='fad_desc' maxlength='55555' placeholder='Treść'></textarea>
                            <!--tutaj kiedyś coś pewnie będzie ;-;-->
                            <input type="checkbox" name="fmature_content"> +18 <?php if($_SESSION['is_adult']==0){echo 'Jeśli musisz już umieścić taki post to przynajmniej nie psuj zabawy innym (zobaczysz ten post na swoim profilu) PS. jako osoba niepełnoletnia łamiesz prawo i robisz to na własną odpowiedzialność.';} ?><br>
                            <select class="form-control" name='fcat_id' id="fcat_id">
                                <?php 
                                    include 'f_pickcategory.php';
                                ?>
                            </select>
			<br><input type="submit" name="formsend3" value="Opublikuj" class='btn btn-danger'>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <p class="adbiseparator"></p>
            </div>
            <div class="row" ng-controller="AdbiNewAdController">
                <div id="MyAdsHeader" class="col-md-12">
                    <h4>{{History}}</h4>
                    <p class="adbiseparator"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-8">
                    <?php
                        include 'config/serverconfig.php';
                        include 'f_history.php';
                    ?>
                </div>
                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
    </body>
</html>
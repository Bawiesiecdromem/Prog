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
        <script src="scripts/adbi_master.js"></script>
    </head>
    <body ng-app="AdbiApp">
        <?php
            session_start();
            error_reporting(0);
        ?>
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
                                    <li class="active"><a href="index.php">{{navp2}}</a></li>
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
            <div class="row" ng-controller="AdbiController">
                <div class="col-md-1" style='background-color: red'>
                    test<br>
                    test<br>
                    test<br>
                    test<br>
                    test<br>
                </div>
                <div class="col-md-3" style='background-color: yellow'>
                    Witamy, witamy! Proszę rozgość się, nasi develperzy właśnie tworzą fotele.
                </div>
                <div class="col-md-4" style='background-color: lightgreen'>
                    <div>
                        <div>
                            <h1>{{greeting}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style='background-color: yellow'>
                    test<br>
                    test<br>
                    test<br>
                    test<br>
                    test<br>
                </div>
                <div class="col-md-1" style='background-color: red'>
                    <?php
                        if ($_SESSION['u_email']){
                            echo '<button onclick="location.href=`f_logout.php`" class="btn btn-danger">Logout</button>';
                        }
                        else{
                            echo '<button onclick="location.href=`page_register.html`">Register</button>';
                            echo '<button onclick="location.href=`page_login.html`">Login</button>';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style='background-color: lightsalmon'>
                    test<br>
                    test<br>
                </div>
            </div>
        </div>
        <?php
            if ($_SESSION['u_email']){
                echo "Witaj, ".$_SESSION['u_nick']."!";
            }
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </body>
</html>
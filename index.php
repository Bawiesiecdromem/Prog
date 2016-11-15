<html>
    <head>
        <meta charset="UTF-8">
        <title>Rejstracja</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles/bootstrap.css">
        <link rel="stylesheet" href="styles/bootstrap-theme.css">
        <!--/\ADBIBASICLINKS/\-->
        <script src="scripts/adbi_master_controller.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-3">
                    Witamy, witamy! Proszę rozgość się, nasi develperzy właśnie tworzą fotele.
                </div>
                <div class="col-md-4">
                    <div ng-app="HelloWorldApp">
                        <div ng-controller="HelloWorldController">
                            <h1>{{greeting}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-1">
                    <button onclick="location.href='page_register.html'">Register</button>
                    <button onclick="location.href='page_login.html'">Login</button>
                    <button onclick="location.href='f_logout.php'">Logout</button>
                </div>
            </div>
        </div>
        <?php
            session_start();
            error_reporting(0);
            if ($_SESSION['u_nick']){
                echo "Witaj, ".$_SESSION['u_nick']."!";
            }
        ?>
            
            
            
    </body>
</html>
<html ng-app="AdbiApp">
    <head ng-controller="AdbiHeadController">
        <meta charset="UTF-8">
        <title>{{TitlePageLogin}}</title>
        <!--\/ADBIBASICLINKS\/-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--/\ADBIBASICLINKS/\-->
        <link rel="stylesheet" href="styles/st_bodyschema.css">
        <script type="text/javascript" src="scripts/register_validation.js"></script>
        <link rel="stylesheet" href="styles/registerinvalidfields.css">
        <link rel="stylesheet" href="styles/st_page_login.css">
        <script src="scripts/adbi_master.js"></script>
    </head>
    <body>
        <div class="container">
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
                                    <li><a href="{{HrefRegister}}">{{Register}}</a></li>
                                    <li class="active"><a href="{{HrefLogin}}">{{Login}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!--/\NAV/\-->
            <form id="form_login" accept-charset="UTF-8" action="f_login.php" method="POST">
                <div class="row">
                    <p class="adbiseparator"></p>
                    <div class="col-md-4">
                        
                    </div>
                    <div id="formdiv1" class="col-md-4" ng-controller="AdbiUserFormController">
                        <div class="form-group">
                            <p>{{Email}}<br></p>
                            <input type="email" id="fu_email" class="form-control" name="fu_email" placeholder="{{HolderEmail}}" required>
                            <span class="komentarz"></span><br><br>
                            <br>
                        </div>
                        <div class="form-group">
                            <p>{{Password}}<br></p>
                            <input type="password" class="form-control" name="fu_password" placeholder="{{HolderPassword}}" required>
                            <span class="komentarz"></span><br><br>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <center><input type="submit" name="formsend" value="Wyślij!" class='btn btn-danger'></center>
                    </div>
                </div>
                <div class="row">
                    <p class="adbiseparator"></p>
                </div>
            </form>
        </div>
    </body>
</html>
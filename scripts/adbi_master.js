angular.module('AdbiApp', [])
        .controller('AdbiNavbarController', function($scope) {
            $scope.navp1 = "ADBI";
            $scope.navp2 = "Strona główna";
            $scope.navp3 = "Przeglądaj";
            $scope.navp4 = "Obublikuj";
            $scope.Register = "Załóż konto";
            $scope.Login = "Zaloguj się";
            $scope.MyAds = "Moje ogłoszenia";
            $scope.MyAccount = "Moje konto";
            $scope.Logout = ";-; Wyloguj ;-;";
})
        .controller('AdbiController', function($scope) {
            $scope.r1c1 = "test";
            $scope.r1c2 = "test";
            $scope.r1c3 = "test";
            $scope.r1c4 = "test";
            $scope.r1c5 = "test";
            $scope.WIP = "Witamy, witamy! Proszę rozgość się, nasi develperzy właśnie tworzą fotele.";
            $scope.greeting = "ADBI Send The Regards";
            $scope.WelcomeInHeaven = "There is a Heaven, let's keep it a secret.";
            $scope.testo = '<h1>links!</h1>';
})
        .controller('AdbiPageMyAccountController', function($scope) {
            $scope.tt = "";
})
        .controller('AdbiUserFormController', function($scope) {
            //Inputs:
            $scope.Email = "E-mail:";
            $scope.Nick = "Nick:";
            $scope.Password = "Hasło:";
            $scope.RPassword = "Powtórz hasło:";
            $scope.Name = "Imię:";
            $scope.Forename = "Nazwisko:";
            $scope.Phone = "Telefon:";
            $scope.Birth = "Data urodzenia:";
            $scope.Avatar = "Avatar:";
            //Others:
            $scope.Edit = "Edytuj";
            $scope.Change = "Zmień...";
            //Holders:
            $scope.HolderEmail = "JohnSnow@example.com";
            $scope.HolderNick = "JohnSnowTheFirst";
            $scope.HolderPassword = "********";
            $scope.HolderRPassword = "********";
            $scope.HolderName = "John";
            $scope.HolderForename = "Snow";
            $scope.HolderPhone = "123456789";
            $scope.HolderBirth = "1997-01-01";
            //Togglers http://stackoverflow.com/questions/24320237/change-the-text-of-the-button-on-click-using-angular-js
            $E="glyphicon glyphicon-pencil"; //edytuj
            $Z="glyphicon glyphicon-ok"; //zapisz
            $CSa=""; //edytuj
            $CSb='href="index.php"'; //wyślij
            $scope.EditSaveToggle1 = true;
            $scope.$watch('EditSaveToggle1', function(){
                $scope.ESToggle1 = $scope.EditSaveToggle1 ? $E : $Z;
                $scope.CleverSender = $scope.EditSaveToggle1 ? $CSa : $CSb;
            });
            $scope.EditSaveToggle2 = true;
            $scope.$watch('EditSaveToggle2', function(){
                $scope.ESToggle2 = $scope.EditSaveToggle2 ? $E : $Z;
            });
            $scope.EditSaveToggle3 = true;
            $scope.$watch('EditSaveToggle3', function(){
                $scope.ESToggle3 = $scope.EditSaveToggle3 ? $E : $Z;
            });
            $scope.EditSaveToggle4 = true;
            $scope.$watch('EditSaveToggle4', function(){
                $scope.ESToggle4 = $scope.EditSaveToggle4 ? $E : $Z;
            });
            $scope.EditSaveToggle5 = true;
            $scope.$watch('EditSaveToggle5', function(){
                $scope.ESToggle5 = $scope.EditSaveToggle5 ? $E : $Z;
            });
            $scope.EditSaveToggle6 = true;
            $scope.$watch('EditSaveToggle6', function(){
                $scope.ESToggle6 = $scope.EditSaveToggle6 ? $E : $Z;
            });
            $scope.EditSaveToggle7 = true;
            $scope.$watch('EditSaveToggle7', function(){
                $scope.ESToggle7 = $scope.EditSaveToggle7 ? $E : $Z;
            });
})
        .controller('AdbiHeadController', function($scope) {
            $scope.TitleIndex = "ADBI";
            $scope.TitlePageRegister = "Rejstracja";
            $scope.TitlePageLogin = "Logowanie";
            $scope.TitlePageMyAccount = "Moje Konto";
            $scope.TitlePageAddNewAd = "Dodaj nowe ogłoszenie";
})
        .controller('AdbiNewAdController', function($scope) {
            $scope.TypeOfTypes = "Wybierz typ:";
            $scope.Type1 = "Post";
            $scope.Type2 = "Zdjęcie";
            $scope.Type3 = "Ogłoszenie";
            $scope.MyAds = "Moje ogłoszenia:";
})
        .controller('AdbiPageAccountEdit', function($scope,$http) {
	    $scope.edit = function(u_id, u_email, u_nick, u_password, u_name, u_forename, u_phone, u_birth)
	{
		$scope.u_id=u_id;
		$scope.u_email=u_email;
		$scope.u_nick=u_nick;
		$scope.u_password=u_password;
		$scope.u_name=u_name;
		$scope.u_forename=u_forename;
		$scope.u_phone=u_phone;
		$scope.u_birth=u_birth;
		$scope.btnName="Edytuj";
		$scope.displayStud();
	};
});
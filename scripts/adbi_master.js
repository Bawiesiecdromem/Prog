angular.module('AdbiApp', [])
        .controller('AdbiNavbarController', function($scope) {
            $scope.navp1 = "ADBI";
            $scope.navp2 = "Strona główna";
            $scope.navp3 = "T.T";
            $scope.navp4 = "T.T";
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
            $scope.greeting = "ADBI Send The Regards";
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
            //Holders:
            $scope.HolderEmail = "JohnSnow@example.com";
            $scope.HolderNick = "JohnSnowTheFirst";
            $scope.HolderPassword = "********";
            $scope.HolderRPassword = "********";
            $scope.HolderName = "John";
            $scope.HolderForename = "Snow";
            $scope.HolderPhone = "123456789";
            $scope.HolderBirth = "1997-01-01";
})
        .controller('AdbiHeadController', function($scope) {
            $scope.TitleIndex = "ADBI";
            $scope.TitlePageRegister = "Rejstracja";
            $scope.TitlePageLogin = "Logowanie";
            $scope.TitlePageMyAccount = "Moje Konto";
            $scope.TitlePageAddNewAd = "Dodaj nowe ogłoszenie";
});
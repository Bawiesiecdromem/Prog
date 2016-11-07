$(document).ready(function() {

 $('#fu_email').on('blur', function() {
 var input = $(this);
 var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
 var is_email = pattern.test(input.val());
 if(is_email){
 input.removeClass("invalid").addClass("valid");
 input.next('.komentarz').text("Jest dobrze").removeClass("alert alert-warning").addClass("alert alert-success");
 }
 else{
 input.removeClass("valid").addClass("invalid");
 input.next('.komentarz').text("Wprowadź poprawny email!").removeClass("alert alert-success").addClass("alert alert-warning");
 }
 });    
   
$('#fu_nick').on('blur', function() {
 var input = $(this);
 var name_length = input.val().length;
 if(name_length >= 5 && name_length <= 20){
 input.removeClass("invalid").addClass("valid");
 input.next('.komentarz').text("Jest dobrze").removeClass("alert alert-warning").addClass("alert alert-success");
 }
 else{
 input.removeClass("valid").addClass("invalid");
 input.next('.komentarz').text("Od 5 do 20 znaków!").removeClass("alert alert-success").addClass("alert alert-warning"); 
 }
 });
 
 $('#fu_name').on('blur', function() {
 var input = $(this);
 var name_length = input.val().length;
 if(name_length >= 5 && name_length <= 20){
 input.removeClass("invalid").addClass("valid");
 input.next('.komentarz').text("Jest dobrze").removeClass("alert alert-warning").addClass("alert alert-success");
 }
 else{
 input.removeClass("valid").addClass("invalid");
 input.next('.komentarz').text("Od 5 do 20 znaków!").removeClass("alert alert-success").addClass("alert alert-warning"); 
 }
 });
 
  $('#fu_forename').on('blur', function() {
 var input = $(this);
 var name_length = input.val().length;
 if(name_length >= 5 && name_length <= 20){
 input.removeClass("invalid").addClass("valid");
 input.next('.komentarz').text("Jest dobrze").removeClass("alert alert-warning").addClass("alert alert-success");
 }
 else{
 input.removeClass("valid").addClass("invalid");
 input.next('.komentarz').text("Od 5 do 20 znaków!").removeClass("alert alert-success").addClass("alert alert-warning"); 
 }
 }); 

 $('#fu_phone').on('blur', function() {
 var input = $(this);
 var pattern = /^([0-9]{9}?)$/i;
 var is_email = pattern.test(input.val());
 if(is_email){
 input.removeClass("invalid").addClass("valid");
 input.next('.komentarz').text("Jest dobrze").removeClass("alert alert-warning").addClass("alert alert-success");
 }
 else{
 input.removeClass("valid").addClass("invalid");
 input.next('.komentarz').text("Niepoprawny Numer!").removeClass("alert alert-success").addClass("alert alert-warning");
 }
 }); 
 
 $('#fu_birth').on('blur', function() {
 var input = $(this);
 var pattern = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/i;
 var is_email = pattern.test(input.val());
 if(is_email){
 input.removeClass("invalid").addClass("valid");
 input.next('.komentarz').text("Jest dobrze").removeClass("alert alert-warning").addClass("alert alert-success");
 }
 else{
 input.removeClass("valid").addClass("invalid");
 input.next('.komentarz').text("Wprowadź poprawną date(dzień-miesiąc-rok)").removeClass("alert alert-success").addClass("alert alert-warning");
 }
 }); 
 
    $('#submit button').click(function(event){
        var fu_email = $('#fu_email');
        var fu_nick = $('#fu_nick');
        var fu_password = $('#fu_password');
        var rpassword = $('#rpassword');
        var fu_name = $('#fu_name');
        var fu_forename = $('#fu_forename');
        var fu_phone = $('#fu_phone');
        var fu_birth = $('#fu_birth');
        var fu_date = $('#fu_date');
        if(fu_email.hasClass('valid') && fu_nick.hasClass('valid') && fu_password.hasClass('valid') && rpassword.hasClass('valid') && fu_name.hasClass('valid') && fu_forename.hasClass('valid') && fu_phone.hasClass('valid') && fu_birth.hasClass('valid') && fu_date.hasClass('valid'))
        {
            alert("Pomyślnie wysłano formularz."); 
        }
        else 
        {
            event.preventDefault();
            alert("Formularz niepoprawnie wypełniony!"); 
        }
    });
});
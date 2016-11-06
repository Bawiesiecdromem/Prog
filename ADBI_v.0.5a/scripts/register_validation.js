$(document).ready(function() {
    var sz_hinputs = new Array ('#fu_email','#fu_nick','#fu_password','#rpassword','#fu_name','#fu_forename','#fu_phone','#fu_birth','#fu_date');
    var sz_inputs = new Array ('fu_email','fu_nick','fu_password','rpassword','fu_name','fu_forename','fu_phone','fu_birth','fu_date');
    var sz_patterns = new Array (/^\d{1,2}[\/-]\d{1,2}[\/-]\d{4}$/i);
    var sz_alerts = new Array ();
    for (var nr_i=0; nr_i<sz_inputs.length; nr_i++) {
        $(sz_hinputs[nr_i]).on('blur',function(){
            var input=$(this);
            var inputs = sz_patterns[nr_i].test(input.val());
            if(inputs)
            {
               input.removeClass("invalid").addClass("valid");
               input.next('.komentarz').text("Wprowadzone dane spełniają wymagania.").removeClass("alert alert-warning").addClass("alert alert-success");
            }
            else
            {
                input.removeClass("valid").addClass("invalid");
                input.next('.komentarz').text(sz_alerts[nr_i]).removeClass("alert alert-success").addClass("alert alert-warning");
            }
        });
    };
    $('#submit button').click(function(event){
        var fu_email = $('#u_email');
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
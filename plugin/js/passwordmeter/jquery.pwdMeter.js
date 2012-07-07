/**
@name jQuery pwdMeter 1.0.1
@author Shouvik Chatterjee (mailme@shouvik.net)
@date 31 Oct 2010
@modify 31 Dec 2010
@license Free for personal and commercial use as long as the author's name retains
*/
(function(jQuery){

    jQuery.fn.pwdMeter = function(options){


        options = jQuery.extend({
            
            minLength: 6,
            displayGeneratePassword: false,
            generatePassText: 'Password Generator',
            generatePassClass: 'GeneratePasswordLink',
            randomPassLength: 13,
            passwordBox: this,
            outputID : '#pwdMeter'
	
        }, options);


        return this.each(function(index){
	
            $(this).keyup(function(){
                evaluateMeter();
            });
		
		
            function evaluateMeter(){

                var passwordStrength   = 0;
                var password = $(options.passwordBox).val();

                if ((password.length >0) && (password.length <=5)) passwordStrength=1;
		
                if (password.length >= options.minLength) passwordStrength++;

                if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/)) ) passwordStrength++;

                if (password.match(/\d+/)) passwordStrength++;

                if (password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))	passwordStrength++;

                if (password.length > 12) passwordStrength++;
		
                $(options.outputID).removeClass();
                $(options.outputID).addClass('neutral');
		
                switch(passwordStrength){
                    case 1:
                        $(options.outputID).addClass('veryweak');
                        $(options.outputID).text('Very Weak');
                        break;
                    case 2:
                        $(options.outputID).addClass('weak');
                        $(options.outputID).text('Weak');
                        break;
                    case 3:
                        $(options.outputID).addClass('medium');
                        $(options.outputID).text('Medium');
                        break;
                    case 4:
                        $(options.outputID).addClass('strong');
                        $(options.outputID).text('Strong');
                        break;
                    case 5:
                        $(options.outputID).addClass('verystrong');
                        $(options.outputID).text('Very Strong');
                        break;		  		  		  
                    default:
                        $(options.outputID).addClass('neutral');
                        $(options.outputID).text('Very Weak');
                }		
		
            }
		
	
            if(options.displayGeneratePassword){
                $(options.outputID).after('&nbsp;<span id="Spn_PasswordGenerator" class="'+options.generatePassClass+'">'+ options.generatePassText +'</span>&nbsp;<span id="Spn_NewPassword" class="NewPassword"></span>');
            }
		
            $('#Spn_PasswordGenerator').click(function(){
                var randomPassword = random_password();
                $('#Spn_NewPassword').text(randomPassword);
                $(options.passwordBox).val(randomPassword);
                evaluateMeter();
            });
		
		
            function random_password() {
                var allowed_chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz!?$?%^&*()_-+={[}]:;@~#|\<,>.?/";
                var pwd_length = options.randomPassLength;
                var rnd_pwd = '';
                for (var i=0; i<pwd_length; i++) {
                    var rnd_num = Math.floor(Math.random() * allowed_chars.length);
                    rnd_pwd += allowed_chars.substring(rnd_num,rnd_num+1);
                }
                return rnd_pwd;
            }		
	
        });

    }

})(jQuery)

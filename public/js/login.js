var email = document.getElementById('email');
var password = document.getElementById('password');

var email_save = localStorage.getItem('email');
var pass_save = localStorage.getItem('password');

email.setAttribute('value',email_save);
password.setAttribute('value',pass_save);

setInterval(function(){
    if(email_save != null && pass_save != null){
        document.myForm.submit();
    }    
    else{
        location.replace('main_page');
    }
},3000);
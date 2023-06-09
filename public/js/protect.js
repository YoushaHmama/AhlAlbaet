var email_save = localStorage.getItem('email');
var password_save = localStorage.getItem('password');
var email = document.getElementById('email');
var password = document.getElementById('password');

function Check(){
    if(email.value == email_save && password.value == password_save){
        
    }else{
        location.replace('../login');
    }
}


Check();
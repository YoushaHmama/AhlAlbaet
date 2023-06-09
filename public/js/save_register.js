var email = document.getElementById('email');
var password = document.getElementById('password');
var send = document.getElementById('send');

send.addEventListener('click',()=>{
    localStorage.setItem('email',email.value);
    localStorage.setItem('password',password.value);
});
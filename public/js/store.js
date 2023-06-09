// var id = document.getElementById('id');
function Store(){
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    localStorage.setItem('email',email.value);
    localStorage.setItem('password',password.value);
}
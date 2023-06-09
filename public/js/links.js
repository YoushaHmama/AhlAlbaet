var login = document.getElementById("login");
var register = document.getElementById("register");

//go to login page function
function Login(){
    login.style.animationName = "button_animation";
    login.style.boxShadow = "0px 0px 0px 0px";
    setTimeout(()=>{
        location.replace("/users/login");
    },3000);
}

//go to register page function
function Register(){
    register.style.animationName = "button_animation";
    register.style.boxShadow = "0px 0px 0px 0px";
    setTimeout(()=>{
        location.replace("/users/register");
    },3000);
}
var profile = document.getElementById("profile");
var setting = document.getElementById("setting");
var posts = document.getElementById("posts");
var setting_section = document.getElementById("setting_section");
var posts_section = document.getElementById("common_posts_section");
var logout = document.getElementById("logout");

var page_number = localStorage.getItem('page');

var setting_page = false;
var posts_page = false;

//move to profile page
profile.addEventListener("click",function(){
    localStorage.setItem('page',1);
    profile.style.fill = "yellow";
    posts.style.fill = "white";
    setting.style.fill = "white";
    setting_section.style.left = "100%";
    posts_section.style.left = "100%";
    if(setting_page || posts_page){
        setting_section.style.animationName = "page_animation2";
        posts_section.style.animationName = "page_animation2";
        setting_page = false;
        posts_page = false;
    }
    posts_section.scrollTo(0,0);
});

//move to setting page
setting.addEventListener("click",function(){
    localStorage.setItem('page',2);
    profile.style.fill = "white";
    posts.style.fill = "white";
    setting.style.fill = "yellow";
    setting_section.style.left = "0%";
    setting_section.style.animationName = "page_animation";
    if(posts_page){
    posts_section.style.animationName = "page_animation3";
    }
    setting_section.style.zIndex = 2;
    posts_section.style.zIndex = 1;
    setting_page = true;
    posts_section.scrollTo(0,0);
});

//move to posts page
posts.addEventListener("click",function(){
    localStorage.setItem('page',3);
    profile.style.fill = "white";
    posts.style.fill = "yellow";
    setting.style.fill = "white";
    posts_section.style.left = "0%";
    posts_section.style.animationName = "page_animation";
    if(setting_page){
        setting_section.style.animationName = "page_animation3";
    }
    posts_section.style.zIndex = 2;
    setting_section.style.zIndex = 1;
    posts_page = true;
});

if(page_number == 1){
    profile.style.fill = "yellow";
    posts.style.fill = "white";
    setting.style.fill = "white";
    setting_section.style.left = "100%";
    posts_section.style.left = "100%";
}else if(page_number == 2){
    profile.style.fill = "white";
    posts.style.fill = "white";
    setting.style.fill = "yellow";
    setting_section.style.left = "0%";
    setting_page = true;
}else if(page_number == 3){
    profile.style.fill = "white";
    posts.style.fill = "yellow";
    setting.style.fill = "white";
    posts_section.style.left = "0%";
    posts_page = true;
}

posts_section.addEventListener('scroll',()=>{
    localStorage.setItem('scroll',posts_section.scrollTop);
});

window.addEventListener('load',()=>{
    posts_section.scrollTo(0,localStorage.getItem('scroll'));
});
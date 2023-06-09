var profile = document.getElementById("profile");
var posts = document.getElementById("posts");
var posts_section = document.getElementById("common_posts_section");

var posts_page = false;

//move to profile page
profile.addEventListener("click",function(){
    profile.style.fill = "yellow";
    posts.style.fill = "white";
    posts_section.style.left = "100%";
    if(posts_page){
        posts_section.style.animationName = "page_animation2";
        posts_page = false;
    }
});

//move to posts page
posts.addEventListener("click",function(){
    profile.style.fill = "white";
    posts.style.fill = "yellow";
    posts_section.style.left = "0%";
    posts_section.style.animationName = "page_animation";
    posts_section.style.zIndex = 2;
    posts_page = true;
});
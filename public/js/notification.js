var notification = document.getElementById("notification");
var notification_section = document.getElementById("notification_section");
var close = document.getElementById("close");

notification.addEventListener("click",()=>{
    notification_section.style.animationName = "page_animation";
    notification_section.style.left = "0";
});

close.addEventListener("click",()=>{
    notification_section.style.animationName = "page_animation2";
    notification_section.style.left = "100%";
});
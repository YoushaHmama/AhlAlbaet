var notification = document.getElementById("notification");
var exist = document.getElementById("exist");
var approvement = document.getElementById("approvement_section");
var close = document.getElementById("close");
var disagree = document.getElementById("disagree");
var reason = document.getElementById("reason");

approvement.style.left = sessionStorage.getItem("notification");

notification.addEventListener("click",()=>{
    sessionStorage.setItem("notification","0%");
    approvement.style.animationName = "page_animation";
    approvement.style.left = "0";
});

if(exist != null)
exist.addEventListener("click",()=>{
    sessionStorage.setItem("notification","0%");
    approvement.style.animationName = "page_animation";
    approvement.style.left = "0";
});

close.addEventListener("click",()=>{
    sessionStorage.setItem("notification","100%");
    approvement.style.animationName = "page_animation2";
    approvement.style.left = "100%";
});

if(disagree != null)
disagree.addEventListener("click",()=>{
    reason.style.display = "block";
});
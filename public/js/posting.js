var create_post = document.getElementById("create_post");
var tools = document.getElementById("tools");
var delete_image = document.getElementById("delete");
var remove_btn = document.getElementById("remove");

var inputPhoto2 = document.getElementById('file2');
const previewImage2 = document.getElementById('photo2');

var is_exit = true;

//open post tools
create_post.addEventListener("click",()=>{
    if(is_exit){
    create_post.style.animationName = "button_animation";
    }
    create_post.style.boxShadow = "0px 0px 0px 0px";
    is_exit = false;
    setTimeout(function(){
        tools.style.display = "block";
    },1000);
});

inputPhoto2.addEventListener('change',function(){
    previewImage2.style.display = "block";
    remove_btn.style.display = "block";
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.addEventListener("load",function(){
            previewImage2.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
    }
});

delete_image.addEventListener("click",()=>{
    tools.style.display = "none";
    create_post.style.animationName = "button_animation2";
    create_post.style.boxShadow = "14px 8px 20px 5px";
    inputPhoto = "";
    is_exit = true;
});

function remove_image(){
    previewImage2.style.display = "none";
    remove_btn.style.display = "none";
    inputPhoto2 = "";
}
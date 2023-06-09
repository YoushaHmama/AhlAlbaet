var fill = document.getElementById("fill");
var timeout_section = document.getElementById("timeout_section");
var author = document.getElementById("author");
var text = document.getElementById("text");

var counter = 0;
var choice1 = Math.round(Math.random());
var choice2 = Math.round(Math.random());
var choice3 = Math.round(Math.random());
var choice = choice1 + choice2 + choice3;

//reload function
function retry(){
    // location.reload();
    timeout_section.style.display = "none";
    var interval = setInterval(()=>{
        counter++;
        if(window.navigator.onLine){
        fill.style.animationName = "loading_animation2";
        fill.style.width = "100%";
        setTimeout(()=>{
            location.replace("../html/login_register_visitor.html");
        },8000);
        }else{
            if(counter == 3){
                timeout_section.style.display = "block";
                clearInterval(interval);
            }
        }   
    },5000);
}

//check internet connection
var interval = setInterval(()=>{
    counter++;
    if(window.navigator.onLine){
    fill.style.animationName = "loading_animation2";
    fill.style.width = "100%";
    setTimeout(()=>{
        location.replace("../html/login_register_visitor.html");
    },8000);
    }else{
        if(counter == 3){
            timeout_section.style.display = "block";
            clearInterval(interval);
        }
    }   
},5000);

//choice text in random
if(choice == 0){
    author.innerHTML = "عن الإمام علي بن أبي طالب كرم الله وجهه";
    text.innerHTML = "كن حلو الصبر عند مر الأمر";
}else if(choice == 1){
    author.innerHTML = "قال الإمام جعفر الصادق عليه السلام";
    text.innerHTML = "لو أجمع الناس على حب علي ما خلق الله النار";
}else if(choice == 2){
    author.innerHTML = "قال الإمام علي بن أبي طالب كرم الله وجهه";
    text.innerHTML = "كما تدين تدان";
}else if(choice == 3){
    author.innerHTML = "قال الإمام علي بن أبي طالب كرم الله وجهه";
    text.innerHTML = "ما مات من أحيا علما";
}
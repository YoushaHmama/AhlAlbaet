var author = document.getElementById("author");
var text = document.getElementById("text");

var choice1 = Math.round(Math.random());
var choice2 = Math.round(Math.random());
var choice3 = Math.round(Math.random());
var choice = choice1 + choice2 + choice3;


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
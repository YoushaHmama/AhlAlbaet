const inputPhoto1 = document.getElementById('file1');
const previewImage1= document.getElementById('photo1');

inputPhoto1.addEventListener('change',function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.addEventListener("load",function(){
            previewImage1.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
    }
});
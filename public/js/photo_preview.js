const inputPhoto = document.getElementById('file');
const previewImage = document.getElementById('photo');

inputPhoto.addEventListener('change',function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.addEventListener("load",function(){
            previewImage.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
    }
});
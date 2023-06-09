document.getElementById('logout').addEventListener('click',()=>{
    localStorage.removeItem('scroll');
    location.replace("../main_page");
});
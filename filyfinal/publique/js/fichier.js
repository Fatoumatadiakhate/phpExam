
const search= document.getElementById("btn_search");
const search_bloc=document.querySelector(".search_form");

search.addEventListener('click', ()=> {
    if (search_bloc.style.display==="none") {
        search_bloc.style.display="flex";        
    }else{
        search_bloc.style.display="none";
    }
});






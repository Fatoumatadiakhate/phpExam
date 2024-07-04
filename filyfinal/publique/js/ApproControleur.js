
import { FournisseurModel } from "./Models/FournisseurModel.js";


document.addEventListener("DOMContentLoaded",(Event)=>{
    const telFournisseur = document.getElementById("telFournisseur");
    const nomFournisseur = document.getElementById("nomComplet");
    const address = document.getElementById("address");
    const Fournisseur = new FournisseurModel();  

    telFournisseur.addEventListener('input', async function(){
    
        if(telFournisseur.value.length>=9){
             let response =  await Fournisseur.findFournisseurByTel(telFournisseur.value);
             let {statut,data}=response;
             if (statut==200) {

                 telFournisseur.classList.remove("is-invalid");
                 telFournisseur.nextElementSibling.textContent=""
                 nomFournisseur.value = data[0]["nomComplet"];
                 address.value = data[0]["address"];

             }else{
                 nomFournisseur.value ="";
                 address.value = "";
                 telFournisseur.classList.add("is-invalid");
                 telFournisseur.nextElementSibling.textContent=`Le numero ${telFournisseur.value} n\'existe pas`;
             }
        }
    });
});

import { Model,WEBROOT } from "../core/Model.js";

export class FournisseurModel extends Model{

    async findFournisseurByTel(tel){
       let response= await this.getData(`${WEBROOT}?controleur=fournisseur&action=get-tel&tel=${tel}`);
       return response;
    }
}
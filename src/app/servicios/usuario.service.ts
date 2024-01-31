import { HttpClient } from '@angular/common/http'; 
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {

  url='http://localhost:8080/licorera/src/app/php/usuario/'

  constructor(private http:HttpClient) {  
  }
  consultar() {
    return this.http.get(this.url+'consulta.php');
    //console.log(this.url);
  }
  insertar(datos:any) {
    //console.log(JSON.stringify(datos));
    return this.http.post(this.url+'insertar.php', JSON.stringify(datos));
  }
  eliminar(id:number) {
    return this.http.get(this.url+'eliminar.php?id='+id);
  }

  edit(datos:any,id:any) {
    return this.http.post(this.url+'editar.php?id='+id, JSON.stringify(datos));
  }

  

}

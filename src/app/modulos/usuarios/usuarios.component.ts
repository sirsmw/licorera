import { Component, OnInit } from '@angular/core';
import { UsuarioService } from 'src/app/servicios/usuario.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-usuarios',
  templateUrl: './usuarios.component.html',
  styleUrls: ['./usuarios.component.scss']
})
export class UsuariosComponent implements OnInit {
  //Variables globales
  verf = false;
  usuario: any;
  iduser:any;
  user = {
    nombre : '',
    usuario :'',
    clave: '',
    tipo: '',

  };
  validnombre= true;
  validusuario=true;
  validclave=true;
  validtipo=true;
  // Validar si edito o agrego un registro
  beditar=false;

  constructor (private suser: UsuarioService) {}
  
  ngOnInit(): void {
    this.consulta();
    this.limpiar();
  }

  // Mostrar formulario de Usuarios
  mostrar(dato:any){
    switch(dato) {
       case 0:
        this.verf=false;
        this.beditar=false;
        this.iduser="";
        this.limpiar();
       break;
       case 1:
        this.verf=true;
       break;
    }
  }
  //Limpiar Campos
  limpiar(){
    this.user.usuario="";
    this.user.nombre="";
    this.user.tipo="";
    this.user.clave="";
  }
  validar(){
    if(this.user.nombre==""){
      this.validnombre=false;
    }else {
      this.validnombre=true;
    }
    if(this.user.usuario==""){
      this.validusuario=false;
    }else {
      this.validusuario=true;
    }
    if(this.user.clave==""){
      this.validclave=false;
    }else {
      this.validclave=true;
    }  
    if(this.user.tipo==""){
      this.validtipo=false;
    }else {
      this.validtipo=true;
    }  
  }

  consulta(){
    this.suser.consultar().subscribe((result:any) => {
      this.usuario = result;
      //console.log(result);
    })
  }

  ingresar(){
    //console.log(this.user);
    this.validar();
    if (this.validnombre==true && this.validusuario==true && this.validtipo==true && this.validclave==true)
    {
      this.suser.insertar(this.user).subscribe((datos:any) => {
      if (datos['resultado']=='OK'){
        this.consulta();
      }
     });
      this.mostrar(0);
      this.limpiar();
    }
  }

  pregunta(id: any,nombre: any){
    console.log("Usuario ID: "+id);
    Swal.fire({
      title: 'Esta seguro de eliminar el usuario: '+nombre+' ?',
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        this.borrarusuario(id);
        Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success"
        });
      }
    });
  }
  borrarusuario(id: any){
    this.suser.eliminar(id).subscribe((datos:any) => {
      if (datos['resultado']=='OK'){
        this.consulta();
      }
     });
     this.consulta();
  }
  cargarusuario(datos:any,id:any){
    console.log("CargarDatos Id",id);
    console.log("CargarDatos datos",datos);
    
    this.user.nombre=datos.nombre;
    this.user.usuario=datos.usuario;
    this.user.clave=datos.clave;
    this.user.tipo=datos.tipo;
    this.iduser=id;
    this.mostrar(1);
    this.beditar=true;
  }

  editar(){
      console.log("Editar User",this.user);
      console.log("Editar Iduser",this.iduser);

      this.validar();
      if (this.validnombre==true && this.validusuario==true && this.validtipo==true && this.validclave==true)
      {

        this.suser.edit(this.user,this.iduser).subscribe((datos:any) => {
          //console.log("resultado",datos['resultado']);
        if (datos['resultado']=='Ok'){
          this.consulta();
        }
       });
        this.mostrar(0);
      }
  }
}
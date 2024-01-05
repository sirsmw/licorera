import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { DashboardComponent } from './modulos/dashboard/dashboard.component';
import { PrincipalComponent } from './modulos/principal.component';
import { LoginComponent } from './modulos/login/login.component';

const routes: Routes = [
  {
    path: '', component: PrincipalComponent,
    children:[
      {path: 'dashboard', component: DashboardComponent },
      {path: '', redirectTo: '/dashboard',  pathMatch: 'full' },

    ]
  },
  {path: 'login', component: LoginComponent},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

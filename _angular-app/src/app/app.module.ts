import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import {FormsModule} from "@angular/forms";
import {HttpClientModule} from "@angular/common/http";
import {RouterModule, Routes} from '@angular/router';

import { CategoryListComponent } from './components/pages/category/category-list/category-list.component';
import { LoginComponent } from './components/pages/login/login.component';
import { AlertErrorComponent } from './components/bootstrap/alert-error/alert-error.component';
import { ModalComponent } from './components/bootstrap/modal/modal.component';
import { CategoryNewModelComponent } from './components/pages/category/category-new-model/category-new-model.component';

const routes: Routes = [
  {
    path: 'login', component: LoginComponent
  },
  {
    path: 'categories/list', component: CategoryListComponent
  },
  {
    path: '',
    redirectTo: '/login',
    pathMatch: 'full'
  }
]

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    CategoryListComponent,
    AlertErrorComponent,
    ModalComponent,
    CategoryNewModelComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    RouterModule.forRoot(routes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

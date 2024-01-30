import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';

import { HomeComponent } from './components/home/home.component';

import { HttpClientModule } from '@angular/common/http';
import {ReactiveFormsModule} from '@angular/forms'
import {FormsModule} from '@angular/forms'

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { CatalogComponent } from './components/catalog/catalog.component';
import { ToastrModule } from 'ngx-toastr';
import { FlowersComponent } from './components/flowers/flowers.component';
import { MatTableModule } from '@angular/material/table' 


@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HomeComponent,
    CatalogComponent,
    FlowersComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule,
    BrowserAnimationsModule,
    NgbModule,
    MatTableModule,
    ToastrModule.forRoot({
      positionClass: 'toast-center-center',
    }),
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

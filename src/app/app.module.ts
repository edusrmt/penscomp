import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';

import { RouterModule, Routes } from '@angular/router';
import { SignFormComponent } from './sign-form/sign-form.component';
import { PanelComponent } from './panel/panel.component';
import { MenuComponent } from './menu/menu.component';
import { SubjectComponent } from './subject/subject.component';

const appRoutes: Routes = [
    { path: 'home', component: HomeComponent},
    { path: 'panel', component: PanelComponent},
    { path: '',
      redirectTo: '/home',
      pathMatch: 'full'
    }
]

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    SignFormComponent,
    PanelComponent,
    MenuComponent,
    SubjectComponent
  ],
  imports: [
    RouterModule.forRoot(
        appRoutes,
        { enableTracing: true }
    ),
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

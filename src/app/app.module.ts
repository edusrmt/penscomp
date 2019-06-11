import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { RouterModule, Routes } from '@angular/router';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MenuComponent } from './menu/menu.component';

import {MatSidenavModule} from '@angular/material/sidenav';
import {MatButtonModule} from '@angular/material/button';
import {MatGridListModule} from '@angular/material/grid-list';
import {MatCardModule} from '@angular/material/card';
import {MatInputModule} from '@angular/material/input';

import { CourseListComponent } from './course-list/course-list.component';
import { SubjectCardComponent } from './subject-card/subject-card.component';
import { PanelComponent } from './panel/panel.component';
import { LoginComponent } from './login/login.component';
import { SubjectListComponent } from './subject-list/subject-list.component';
import { LessonComponent } from './lesson/lesson.component';

const appRoutes : Routes = [
    {path: 'login', component: LoginComponent},
    {path: 'panel', component: PanelComponent},
    {path: 'subject', component: SubjectListComponent},
    {path: '', redirectTo: '/login', pathMatch: 'full'}
]

@NgModule({
  declarations: [
    AppComponent,
    MenuComponent,
    CourseListComponent,
    SubjectListComponent,
    SubjectCardComponent,
    PanelComponent,
    LoginComponent,
    LessonComponent
  ],
  imports: [
    RouterModule.forRoot(appRoutes, { enableTracing: true }),
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatSidenavModule,
    MatButtonModule,
    MatGridListModule,
    MatCardModule,
    MatInputModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

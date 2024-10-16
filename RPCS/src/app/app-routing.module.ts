import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { AboutComponent } from './components/about/about.component';
import { HeaderComponent } from './components/header/header.component';
import { AppointmentComponent } from './components/appointment/appointment.component';
import { DoctorsComponent } from './components/doctors/doctors.component';
import { FooterComponent } from './components/footer/footer.component';
import { HeroSectionComponent } from './components/hero-section/hero-section.component';
import { OurservComponent } from './components/ourserv/ourserv.component';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { AuthGuard } from './auth.guard';
import { UpdateAppointmentComponent } from './components/update-appointment/update-appointment.component';
import { CreateDoctorComponent } from './components/create-doctor/create-doctor.component';
import { UpdateDoctorComponent } from './components/update-doctor/update-doctor.component';
import { ViewAppointmentComponent } from './components/view-appointment/view-appointment.component';
import { ViewUsersComponent } from './components/view-users/view-users.component';

const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'signup', component: SignupComponent },
  { path: 'dashboard', component: DashboardComponent, canActivate: [AuthGuard] },
  { path: '', component: HomeComponent }, // Home component for default route
  { path: 'about', component: HomeComponent, data: { fragment: 'about' } }, // Fragment for About
  { path: 'services', component: HomeComponent, data: { fragment: 'services' } }, // Fragment for Services
  { path: 'doctors', component: HomeComponent, data: { fragment: 'doctors' } }, // Fragment for Doctors
  { path: 'contact', component: HomeComponent, data: { fragment: 'contact' } }, // Fragment for Contact
  { path: 'appointment', component: AppointmentComponent, canActivate: [AuthGuard] },
  { path: 'update-appointment', component: UpdateAppointmentComponent, canActivate: [AuthGuard] },
  { path: 'view-appointment', component: ViewAppointmentComponent, canActivate: [AuthGuard] },
  { path: 'create-doctor', component: CreateDoctorComponent, canActivate: [AuthGuard] },
  { path: 'update-doctor', component: UpdateDoctorComponent, canActivate: [AuthGuard] },
  { path: 'view-users', component:ViewUsersComponent, canActivate: [AuthGuard] },
  { path: '**', redirectTo: '' } // Wildcard route for 404
];

@NgModule({
  imports: [RouterModule.forRoot(routes, { scrollPositionRestoration: 'enabled', anchorScrolling: 'enabled' })],
  exports: [RouterModule]
})
export class AppRoutingModule {}

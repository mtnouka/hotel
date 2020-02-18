import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { GuestFormComponent } from './guests/guest-form/guest-form.component';
import { CheckinFormComponent } from './checkins/checkin-form/checkin-form.component';


const routes: Routes = [
  { path: '', redirectTo: 'checkins', pathMatch: 'full' },
  { path: 'guests', component: GuestFormComponent },
  { path: 'checkins', component: CheckinFormComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

import { NgModule } from '@angular/core';
import { GuestFormComponent } from './guest-form/guest-form.component';
import { GuestListComponent } from './guest-list/guest-list.component';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { GuestComponent } from './guest.component';

@NgModule({
  declarations: [
    GuestFormComponent,
    GuestListComponent,
    GuestComponent
  ], imports: [
    CommonModule,
    RouterModule.forChild([
      {
        path: 'guests', component: GuestComponent
      }
    ])
  ]
})
export class GuestModule{

}

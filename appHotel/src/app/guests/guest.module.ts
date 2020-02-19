import { NgModule } from '@angular/core';
import { GuestFormComponent } from './guest-form/guest-form.component';
import { GuestListComponent } from './guest-list/guest-list.component';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    GuestFormComponent,
    GuestListComponent
  ], imports: [
    CommonModule,
    FormsModule,
    RouterModule.forChild([
      {
        path: 'guests', component: GuestListComponent
      },
      {
        path: 'guests/info/:id', component: GuestFormComponent
      }
    ])
  ]
})
export class GuestModule{

}

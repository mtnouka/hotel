import { NgModule } from '@angular/core';
import { CheckinFormComponent } from './checkin-form/checkin-form.component';
import { CheckinListComponent } from './checkin-list/checkin-list.component';
import { CheckinComponent } from './checkin.component';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

@NgModule({
  declarations: [
    CheckinFormComponent,
    CheckinListComponent,
    CheckinComponent
  ], imports: [
    CommonModule,
    RouterModule.forChild([
      {
        path: 'checkins', component: CheckinComponent
      }
    ])
  ]
})
export class CheckinModule {

}

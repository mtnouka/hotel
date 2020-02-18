import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { GuestFormComponent } from './guests/guest-form/guest-form.component';
import { CheckinFormComponent } from './checkins/checkin-form/checkin-form.component';

@NgModule({
  declarations: [
    AppComponent,
    GuestFormComponent,
    CheckinFormComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

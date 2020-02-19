import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Guest } from '../shared/guest.model';
import { GuestService } from '../shared/guest.service';

@Component({
  templateUrl: './guest-form.component.html'
})
export class GuestFormComponent implements OnInit{

  guest: Guest;

  constructor(private activatedRoute: ActivatedRoute, private guestService: GuestService) { }

  ngOnInit(): void {
    this.guestService.retrieveById(+this.activatedRoute.snapshot.paramMap.get('id')).subscribe({
      next: guest => {
        this.guest = guest['data']
        console.log(this.guest)
      },
      error: err => console.log('Error', err)
    });
  }

  // save(): void {
  //   this.guestService.save(this.guest).subscribe({
  //     next: guest => console.log('Saved with succes', guest),
  //     error: err => console.log('Error', err)
  //   });
  // }

}

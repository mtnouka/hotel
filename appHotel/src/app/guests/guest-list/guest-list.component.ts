import { Component } from '@angular/core';
import { Guest } from '../shared/guest.model';
import { GuestService } from '../shared/guest.service';

@Component({
  templateUrl: './guest-list.component.html'
})
export class GuestListComponent {

  filteredGuests: Guest[] = [];

  _guests: Guest[] = [];

  _filterBy: string;

  constructor(private guestService: GuestService) { }

  ngOnInit(): void {
    this.retrieveAll();
  }

  retrieveAll(): void {
    this.guestService.retrieveAll().subscribe({
      next: guests => {
        this._guests = guests['data'];

        this.filteredGuests = this._guests;
      },
      error: err => console.log('Error', err)
    })
  }

  deleteById(guestId: number): void {
    this.guestService.deleteById(guestId).subscribe({
      next: () => {
        console.log('Delete with success');

        this.retrieveAll();
      },
      error: err => console.log('Error', err)
    })
  }

  set filter(value: string) {
    this._filterBy = value;

    this.filteredGuests = this._guests.filter((guest: Guest) => guest.name.toLocaleLowerCase().indexOf(this._filterBy.toLocaleLowerCase()) > -1);
  }

  get filter() {
    return this._filterBy;
  }

}

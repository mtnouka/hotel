import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Injectable } from '@angular/core';
import { Guest } from './guest.model';

@Injectable({
  providedIn: 'root'
})
export class GuestService {

  private guestUrl: string = 'http://localhost:8000/api/guests';

  constructor(private httpClient: HttpClient) { }

  retrieveAll(): Observable<Guest[]> {
    return this.httpClient.get<Guest[]>(this.guestUrl);
  }

  retrieveById(id: number): Observable<Guest> {
    return this.httpClient.get<Guest>(`${this.guestUrl}/${id}`);
  }

  save(guest: Guest): Observable<Guest> {
    if(guest.id) {
      return this.httpClient.put<Guest>(`${this.guestUrl}/${guest.id}`, guest);
    } else {
      return this.httpClient.post<Guest>(`${this.guestUrl}`, guest)
    }
  }

  deleteById(id: number): Observable<Guest> {
    return this.httpClient.delete<any>(`${this.guestUrl}/${id}`);
  }

}

import { Observable } from 'rxjs/Rx';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable()
export class ApiService {

  constructor(private http: HttpClient) { }
  list() {
    // return this.http.get('/api/characters');
  }

}

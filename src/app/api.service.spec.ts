import { Observable } from 'rxjs/Rx';
import { TestBed, inject } from '@angular/core/testing';

import { ApiService } from './api.service';

let subject;
let http;

describe('ApiService', () => {
  beforeEach(() => {
    http = jasmine.createSpyObj('http', ['get']);
    http.get.and.returnValue(Observable.of([{ id: 1, name: 'Luke' }]));
    subject = new ApiService(http);
  });

  it('should be created', () => {
    expect(subject).toBeTruthy();
  });

  it('returns a list with one item', () => {
    subject.list().subscribe((obs) => {
      expect(obs).toEqual([{ id: 1, name: 'Luke' }]);
    });
  });

  it('should user is the right...', () => {
    subject.list();
    expect(http.get).toHaveBeenCalledWith('/api/characters');

  });

});

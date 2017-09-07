import { HttpClientModule } from '@angular/common/http';
import { ApiService } from './api.service';

import { Observable } from 'rxjs/Rx';
import { TestBed, async } from '@angular/core/testing';
import { RouterTestingModule } from '@angular/router/testing';

import { AppComponent } from './app.component';

let mockApiService;
let subject;
let api;

describe('AppComponent suite', () => {

  describe('Internal Logic', () => {

    beforeEach(() => {
      api = jasmine.createSpyObj('api', ['list']);
      api.list.and.returnValue(Observable.of([{ id: 1, name: 'Luke' }]));
      subject = new AppComponent(api);
    });

    it('component is calling', () => {
      subject.listCharacters.subscribe(list => {
        expect(list).toEqual([{ id: 1, name: 'Luke' }]);
      });
    });

  });

  describe('UI Interation', () => {
      beforeEach(async(() => {
        mockApiService = {
          list: () => {
            return Observable.of([{ id: 1, name: 'Luke' }]);
          }
        };
        TestBed.configureTestingModule({
          imports: [
            RouterTestingModule,
          ],
          declarations: [
            AppComponent
          ],
          providers: [
            { provide: ApiService, useValue: mockApiService },
          ]
        }).compileComponents();
      }));

      it(`should have as title 'app'`, async(() => {
        const fixture = TestBed.createComponent(AppComponent);
        const app = fixture.debugElement.componentInstance;
        expect(app.title).toEqual('app');
      }));

      it('should render title in a h1 tag', async(() => {
        const fixture = TestBed.createComponent(AppComponent);
        fixture.detectChanges();
        const compiled = fixture.debugElement.nativeElement;
        expect(compiled.querySelector('h1').textContent).toContain('Welcome to app!');
      }));

      it('shows characters', async(() => {
        const fixture = TestBed.createComponent(AppComponent);
        fixture.detectChanges();
        const compiled = fixture.debugElement.nativeElement;
        const lis = <Array<any>>compiled.querySelectorAll('li');
        expect(lis.length).toEqual(1);
      }));

  });
});

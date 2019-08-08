import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AdaptativeComponent } from './adaptative.component';

describe('AdaptativeComponent', () => {
  let component: AdaptativeComponent;
  let fixture: ComponentFixture<AdaptativeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AdaptativeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AdaptativeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

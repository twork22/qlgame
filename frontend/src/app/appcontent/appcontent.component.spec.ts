import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AppcontentComponent } from './appcontent.component';

describe('AppcontentComponent', () => {
  let component: AppcontentComponent;
  let fixture: ComponentFixture<AppcontentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AppcontentComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AppcontentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

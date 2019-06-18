import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CategoryNewModelComponent } from './category-new-model.component';

describe('CategoryNewModelComponent', () => {
  let component: CategoryNewModelComponent;
  let fixture: ComponentFixture<CategoryNewModelComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CategoryNewModelComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CategoryNewModelComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

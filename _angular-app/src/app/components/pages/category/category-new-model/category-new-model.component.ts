import { Component, OnInit,ViewChild } from '@angular/core';
import { ModalComponent } from 'src/app/components/bootstrap/modal/modal.component';
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'category-new-model',
  templateUrl: './category-new-model.component.html',
  styleUrls: ['./category-new-model.component.css']
})
export class CategoryNewModelComponent implements OnInit {

  category = {
    name: ''
  }

  @ViewChild(ModalComponent)
  modal: ModalComponent;

  constructor(private http: HttpClient) { }

  ngOnInit() {
  }

  submit() {
    const token = window.localStorage.getItem('token');
    this.http
      .post('http://localhost:8000/api/categories', this.category, {
        headers: {
          'Authorization': `Bearer ${token}`
        }
      }).subscribe((category) => {
        console.log(category);
        this.modal.hide();
        //this.getCategories();
       
      });
  }


  showModal(){
    this.modal.show();
  }

  hideModal($event){
    console.log($event);
  }
}

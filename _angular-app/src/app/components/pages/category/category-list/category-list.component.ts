import { Component, OnInit,ViewChild } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { CategoryNewModelComponent } from '../category-new-model/category-new-model.component';


declare let $;

@Component({
  selector: 'app-category-list',
  templateUrl: './category-list.component.html',
  styleUrls: ['./category-list.component.css']
})
export class CategoryListComponent implements OnInit {

  categories = [];
  
  @ViewChild(CategoryNewModelComponent)
  categoryNewModel: CategoryNewModelComponent;

  constructor(private http: HttpClient) { }

  ngOnInit() {
    this.getCategories();
  }

  
  getCategories() {
    const token = window.localStorage.getItem('token');
    this.http.get<{ data: Array<any> }>('http://localhost:8000/api/categories', {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    })
      .subscribe(response => {
        //response.data[0].active = false;
        this.categories = response.data
      });
  }

  showModalInsert(){
    this.categoryNewModel.showModal();
  }

  

}

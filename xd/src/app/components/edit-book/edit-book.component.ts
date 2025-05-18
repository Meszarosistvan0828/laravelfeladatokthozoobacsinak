import { CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Component,OnInit } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { ApiService } from '../../../service/api.service';

@Component({
  selector: 'app-edit-book',
  standalone: true,
  imports: [CommonModule,ReactiveFormsModule],
  templateUrl: './edit-book.component.html',
  styleUrl: './edit-book.component.css'
})
export class EditBookComponent implements OnInit {
  bookId: number=0;
  bookForm: FormGroup;

  constructor(private route: ActivatedRoute,private fb: FormBuilder, private http: HttpClient,private apiService: ApiService) {    
      this.bookForm = this.fb.group({
      title: [''],
      author: [''],
    })}
  
  ngOnInit() {
    this.bookId = parseInt(this.route.snapshot.paramMap.get('id') || '0', 10);
    this.apiService.editData(this.bookId).subscribe
  }
  submit(){

  }
}

import { CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-new-book',
  standalone: true,
  imports: [CommonModule,ReactiveFormsModule],
  templateUrl: './new-book.component.html',
  styleUrl: './new-book.component.css'
})
export class NewBookComponent {
  
bookForm: FormGroup;

  constructor(private fb: FormBuilder, private http: HttpClient) {
    this.bookForm = this.fb.group({
      title: [''],
      author: [''],
    })
  }
submit() {
    const formData = this.bookForm.value;

    this.http.post('http://localhost:8000/api/books', formData).subscribe({
      next: (res) => console.log('Sikeres mentés:', res),
      error: (err) => console.error('Hiba történt:', err),
    });
}
}
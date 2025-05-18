import { Component, OnInit } from '@angular/core';
import { ApiService } from '../../../service/api.service';
import { CommonModule } from '@angular/common';
import { Router, RouterLink } from '@angular/router';

@Component({
  selector: 'app-books',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './books.component.html',
  styleUrl: './books.component.css'
})
export class BooksComponent implements OnInit{
ngOnInit(): void {
    this.apiServices.getData().subscribe({
    next: (res) => this.data = res,
    error: (err) => console.error('Hiba az APi híváskor:',err),
  });
}
data: any[] =[];

constructor(private apiServices: ApiService, private router: Router) {}

  deleteItem(id: number): void {
    this.apiServices.deleteItem(id).subscribe({
      next: () => {
        // Frissítsd a listát törlés után
        this.data = this.data.filter(item => item.id !== id);
      },
      error: (err) => console.error('Törlés hiba:', err)
    });
  }

 editItem(id: number): void {
  this.router.navigate(['/edit', id]);
}

}


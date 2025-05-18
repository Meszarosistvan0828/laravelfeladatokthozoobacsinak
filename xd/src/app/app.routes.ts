import { Routes } from '@angular/router';
import { BooksComponent } from './components/books/books.component';
import { NewBookComponent } from './components/new-book/new-book.component';
import { EditBookComponent } from './components/edit-book/edit-book.component';

export const routes: Routes = [
    {path:'books', component:BooksComponent},
    {path:'new-book', component:NewBookComponent},
    {path:'edit/:id', component:EditBookComponent},
];

import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
private baseURL = "http://127.0.0.1:8000/api/";

  constructor(private http: HttpClient) { }

  getData(): Observable<any>{
    return this.http.get(`${this.baseURL}books`)
  }

  deleteItem(id: number): Observable<any> {
  return this.http.delete(`${this.baseURL}books/${id}`);
}
  editData(id: number): Observable<any>{
    return this.http.get(`${this.baseURL}books/${id}`)
  }
}

import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, BehaviorSubject } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { environment } from '../../environments/environment';

export interface Course {
  id: number;
  title: string;
  description: string;
  instructor: string;
  price: number;
  rating: number;
  students: number;
  duration: string;
  level: string;
  thumbnail: string;
}

export interface ApiResponse<T> {
  status: string;
  data: T;
  total?: number;
  timestamp: string;
  message?: string;
}

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private readonly baseUrl = environment.apiUrl || 'http://localhost:8000/api';
  private loadingSubject = new BehaviorSubject<boolean>(false);
  public loading$ = this.loadingSubject.asObservable();

  constructor(private http: HttpClient) {}

  private getHeaders(): HttpHeaders {
    return new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    });
  }

  private setLoading(loading: boolean): void {
    this.loadingSubject.next(loading);
  }

  /**
   * Test API connection
   */
  testConnection(): Observable<ApiResponse<any>> {
    this.setLoading(true);
    return this.http.get<ApiResponse<any>>(`${this.baseUrl}/test`, {
      headers: this.getHeaders()
    }).pipe(
      map(response => {
        this.setLoading(false);
        return response;
      }),
      catchError(error => {
        this.setLoading(false);
        console.error('API connection test failed:', error);
        throw error;
      })
    );
  }

  /**
   * Get health status
   */
  getHealth(): Observable<ApiResponse<any>> {
    return this.http.get<ApiResponse<any>>(`${this.baseUrl}/health`, {
      headers: this.getHeaders()
    });
  }

  /**
   * Get all courses
   */
  getCourses(): Observable<ApiResponse<Course[]>> {
    this.setLoading(true);
    return this.http.get<ApiResponse<Course[]>>(`${this.baseUrl}/courses`, {
      headers: this.getHeaders()
    }).pipe(
      map(response => {
        this.setLoading(false);
        return response;
      }),
      catchError(error => {
        this.setLoading(false);
        console.error('Failed to fetch courses:', error);
        throw error;
      })
    );
  }

  /**
   * Get course by ID
   */
  getCourse(id: number): Observable<ApiResponse<Course>> {
    this.setLoading(true);
    return this.http.get<ApiResponse<Course>>(`${this.baseUrl}/courses/${id}`, {
      headers: this.getHeaders()
    }).pipe(
      map(response => {
        this.setLoading(false);
        return response;
      }),
      catchError(error => {
        this.setLoading(false);
        console.error(`Failed to fetch course ${id}:`, error);
        throw error;
      })
    );
  }

  /**
   * Search courses
   */
  searchCourses(query: string): Observable<ApiResponse<Course[]>> {
    this.setLoading(true);
    return this.http.get<ApiResponse<Course[]>>(`${this.baseUrl}/courses/search`, {
      headers: this.getHeaders(),
      params: { q: query }
    }).pipe(
      map(response => {
        this.setLoading(false);
        return response;
      }),
      catchError(error => {
        this.setLoading(false);
        console.error('Failed to search courses:', error);
        throw error;
      })
    );
  }
}

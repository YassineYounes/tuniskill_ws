import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MatButtonModule } from '@angular/material/button';
import { MatCardModule } from '@angular/material/card';
import { MatProgressSpinnerModule } from '@angular/material/progress-spinner';
import { MatSnackBar, MatSnackBarModule } from '@angular/material/snack-bar';
import { ApiService, Course, ApiResponse } from '../../services/api';
import { HeroSectionComponent } from '../../components/hero-section/hero-section';
import { CourseCardComponent } from '../../components/course-card/course-card';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    CommonModule,
    MatButtonModule,
    MatCardModule,
    MatProgressSpinnerModule,
    MatSnackBarModule,
    HeroSectionComponent,
    CourseCardComponent
  ],
  templateUrl: './home.html',
  styleUrl: './home.scss'
})
export class HomeComponent implements OnInit {
  courses: Course[] = [];
  loading = false;
  apiConnected = false;

  constructor(
    private apiService: ApiService,
    private snackBar: MatSnackBar
  ) {}

  ngOnInit(): void {
    this.testApiConnection();
    this.loadCourses();
  }

  testApiConnection(): void {
    this.apiService.testConnection().subscribe({
      next: (response: ApiResponse<any>) => {
        this.apiConnected = true;
        console.log('API Connection successful:', response);
        this.snackBar.open('Connected to TuniSkill API', 'Close', {
          duration: 3000,
          panelClass: ['success-snackbar']
        });
      },
      error: (error) => {
        this.apiConnected = false;
        console.error('API Connection failed:', error);
        this.snackBar.open('Failed to connect to API', 'Close', {
          duration: 5000,
          panelClass: ['error-snackbar']
        });
      }
    });
  }

  loadCourses(): void {
    this.loading = true;
    this.apiService.getCourses().subscribe({
      next: (response: ApiResponse<Course[]>) => {
        this.courses = response.data;
        this.loading = false;
        console.log('Courses loaded:', this.courses);
      },
      error: (error) => {
        this.loading = false;
        console.error('Failed to load courses:', error);
        this.snackBar.open('Failed to load courses', 'Close', {
          duration: 5000,
          panelClass: ['error-snackbar']
        });
      }
    });
  }

  retryConnection(): void {
    this.testApiConnection();
    this.loadCourses();
  }
}

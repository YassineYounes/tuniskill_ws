# TuniSkill - E-Learning Platform

TuniSkill is a comprehensive e-learning platform built with modern web technologies, designed to provide a Udemy-like experience for online education. The platform features a robust Symfony backend API and a dynamic Angular frontend, creating a scalable and maintainable architecture for delivering high-quality educational content.

## Architecture Overview

This project follows a microservices-inspired architecture with clear separation between frontend and backend concerns:

- **Backend**: Symfony 6.4 API providing RESTful endpoints
- **Frontend**: Angular 18+ Single Page Application (SPA)
- **Database**: MySQL/PostgreSQL for data persistence
- **Authentication**: JWT-based authentication system
- **File Storage**: Local/Cloud storage for course materials and media

## Project Structure

```
tuniskill_ws/
├── backend/
│   └── tuniskill-api/          # Symfony API application
│       ├── src/
│       │   ├── Controller/Api/  # API controllers
│       │   ├── Entity/         # Doctrine entities
│       │   ├── Repository/     # Data repositories
│       │   ├── Service/        # Business logic services
│       │   └── EventListener/  # Event listeners
│       ├── config/             # Configuration files
│       ├── migrations/         # Database migrations
│       └── tests/              # Backend tests
├── frontend/
│   └── tuniskill-frontend/     # Angular application
│       ├── src/
│       │   ├── app/
│       │   │   ├── components/ # Reusable components
│       │   │   ├── pages/      # Page components
│       │   │   ├── services/   # Angular services
│       │   │   ├── models/     # TypeScript interfaces
│       │   │   ├── guards/     # Route guards
│       │   │   └── interceptors/ # HTTP interceptors
│       │   └── environments/   # Environment configurations
│       └── public/             # Static assets
├── docs/                       # Project documentation
├── .github/                    # GitHub workflows and templates
└── docker/                     # Docker configuration files
```

## Core Features

### User Management
- User registration and authentication
- Profile management and preferences
- Role-based access control (Student, Instructor, Admin)
- Social authentication integration

### Course Management
- Course creation and editing tools
- Video upload and streaming
- Course categorization and tagging
- Progress tracking and completion certificates

### Learning Experience
- Interactive video player with playback controls
- Course notes and bookmarks
- Discussion forums and Q&A
- Quizzes and assessments
- Mobile-responsive design

### Business Features
- Payment processing and subscription management
- Course pricing and discount systems
- Instructor revenue sharing
- Analytics and reporting dashboard

## Technology Stack

### Backend Technologies
- **PHP 8.1+**: Modern PHP with strong typing
- **Symfony 6.4**: Robust web framework with excellent ecosystem
- **Doctrine ORM**: Database abstraction and object mapping
- **JWT Authentication**: Secure token-based authentication
- **PHPUnit**: Comprehensive testing framework

### Frontend Technologies
- **Angular 18+**: Modern TypeScript-based framework
- **RxJS**: Reactive programming for async operations
- **Angular Material**: UI component library
- **SCSS**: Enhanced CSS with variables and mixins
- **Jasmine/Karma**: Testing framework and test runner

### Development Tools
- **Composer**: PHP dependency management
- **npm/yarn**: Node.js package management
- **Angular CLI**: Development and build tools
- **Symfony CLI**: Development server and tools

## Getting Started

### Prerequisites
- PHP 8.1 or higher
- Node.js 18+ and npm
- MySQL 8.0+ or PostgreSQL 13+
- Composer
- Git

### Backend Setup

1. Navigate to the backend directory:
   ```bash
   cd backend/tuniskill-api
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Configure environment variables:
   ```bash
   cp .env .env.local
   # Edit .env.local with your database credentials
   ```

4. Create and migrate the database:
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. Start the development server:
   ```bash
   symfony server:start
   ```

### Frontend Setup

1. Navigate to the frontend directory:
   ```bash
   cd frontend/tuniskill-frontend
   ```

2. Install Node.js dependencies:
   ```bash
   npm install
   ```

3. Configure environment settings:
   ```bash
   # Edit src/environments/environment.ts with API endpoints
   ```

4. Start the development server:
   ```bash
   ng serve
   ```

The application will be available at:
- Frontend: http://localhost:4200
- Backend API: http://localhost:8000

## Development Workflow

### Branch Strategy
- `main`: Production-ready code
- `develop`: Integration branch for features
- `feature/*`: Individual feature branches
- `hotfix/*`: Critical bug fixes

### Code Standards
- Follow PSR-12 coding standards for PHP
- Use Angular style guide for TypeScript
- Implement comprehensive unit and integration tests
- Use meaningful commit messages following conventional commits

### Testing
- Backend: Run `php bin/phpunit` for unit tests
- Frontend: Run `ng test` for unit tests and `ng e2e` for end-to-end tests
- API testing with Postman collections included

## Deployment

### Production Environment
- Use Docker containers for consistent deployment
- Configure reverse proxy (Nginx) for routing
- Set up SSL certificates for HTTPS
- Configure database connection pooling
- Implement caching strategies (Redis/Memcached)

### CI/CD Pipeline
- Automated testing on pull requests
- Code quality checks with SonarQube
- Automated deployment to staging environment
- Manual approval for production deployment

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for detailed contribution guidelines.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support and questions:
- Create an issue on GitHub
- Contact the development team
- Check the documentation in the `docs/` directory

## Roadmap

### Phase 1 (Current)
- Basic user authentication and registration
- Course creation and management
- Video upload and streaming
- Basic payment integration

### Phase 2
- Advanced analytics and reporting
- Mobile application development
- Live streaming capabilities
- Advanced assessment tools

### Phase 3
- AI-powered course recommendations
- Gamification features
- Multi-language support
- Enterprise features and integrations

---

**TuniSkill** - Empowering education through technology


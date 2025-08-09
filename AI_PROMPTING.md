# AI Prompting Templates for TuniSkill Development

This document provides standardized prompting templates for AI-assisted development of the TuniSkill e-learning platform. These templates ensure consistency, efficiency, and quality when working with AI tools throughout the development process.

## General Development Context

### Project Context Template
```
You are working on TuniSkill, an e-learning platform similar to Udemy. The project uses:
- Backend: Symfony 6.4 with PHP 8.1+
- Frontend: Angular 18+ with TypeScript
- Database: MySQL/PostgreSQL with Doctrine ORM
- Authentication: JWT-based authentication
- Architecture: RESTful API with SPA frontend

Project structure:
- backend/tuniskill-api/ (Symfony application)
- frontend/tuniskill-frontend/ (Angular application)

Please consider the existing codebase and maintain consistency with established patterns.
```

## Backend Development Templates

### Symfony Entity Creation
```
Create a Symfony entity for [ENTITY_NAME] with the following requirements:
- [List specific fields and their types]
- [Relationships to other entities]
- [Validation constraints]
- [Any special behaviors or methods needed]

Please include:
1. The entity class with proper annotations
2. Doctrine repository class
3. Database migration file
4. Basic CRUD operations in the repository

Follow Symfony best practices and use proper type hints.
```

### API Controller Development
```
Create a Symfony API controller for [RESOURCE_NAME] with the following endpoints:
- GET /api/[resource] - List all resources with pagination
- GET /api/[resource]/{id} - Get specific resource
- POST /api/[resource] - Create new resource
- PUT /api/[resource]/{id} - Update existing resource
- DELETE /api/[resource]/{id} - Delete resource

Requirements:
- [Specific business logic requirements]
- [Authentication/authorization requirements]
- [Validation rules]
- [Response format specifications]

Please include:
1. Controller class with all endpoints
2. Request/Response DTOs if needed
3. Proper error handling
4. API documentation annotations
5. Unit tests for the controller
```

### Service Layer Development
```
Create a Symfony service for [SERVICE_NAME] that handles:
- [List of responsibilities]
- [Business logic requirements]
- [Integration requirements]

The service should:
1. Follow SOLID principles
2. Be properly injected via dependency injection
3. Include comprehensive error handling
4. Have unit tests with mocked dependencies
5. Use proper logging for debugging

Please provide the service class, interface (if needed), and test class.
```

## Frontend Development Templates

### Angular Component Creation
```
Create an Angular component for [COMPONENT_NAME] with the following features:
- [List of UI requirements]
- [Data binding requirements]
- [Event handling needs]
- [Integration with services]

Component specifications:
- [Input properties]
- [Output events]
- [Lifecycle hooks needed]
- [Responsive design requirements]

Please include:
1. Component TypeScript class
2. HTML template with proper structure
3. SCSS styles following Angular Material design
4. Unit tests with TestBed configuration
5. Integration with required services
```

### Angular Service Development
```
Create an Angular service for [SERVICE_NAME] that provides:
- [List of service responsibilities]
- [API integration requirements]
- [State management needs]
- [Error handling requirements]

The service should:
1. Use HttpClient for API communication
2. Implement proper error handling with user-friendly messages
3. Include loading states and progress indicators
4. Use RxJS operators for data transformation
5. Have comprehensive unit tests with HttpClientTestingModule

Please provide the service class, interface definitions, and test suite.
```

### Angular Form Development
```
Create an Angular reactive form for [FORM_PURPOSE] with the following fields:
- [List of form fields with types and validation rules]
- [Custom validation requirements]
- [Conditional field display logic]
- [Submission handling requirements]

Form requirements:
- Use Angular Reactive Forms
- Implement proper validation with error messages
- Include loading states during submission
- Handle success and error responses
- Be accessible and responsive

Please include the form component, template, validation logic, and tests.
```

## Database and Migration Templates

### Database Schema Design
```
Design a database schema for [FEATURE_NAME] with the following requirements:
- [List of entities and their relationships]
- [Data integrity constraints]
- [Performance considerations]
- [Indexing requirements]

Please provide:
1. Entity relationship diagram (textual description)
2. Doctrine entity classes with proper annotations
3. Migration files for schema creation
4. Sample data fixtures for testing
5. Repository methods for common queries
```

### Database Migration
```
Create a Doctrine migration to [MIGRATION_PURPOSE] with the following changes:
- [List of schema changes needed]
- [Data migration requirements if any]
- [Rollback considerations]

The migration should:
1. Be reversible (implement both up and down methods)
2. Handle existing data safely
3. Include proper error handling
4. Be tested with sample data
5. Follow Doctrine migration best practices
```

## Testing Templates

### Unit Test Creation
```
Create comprehensive unit tests for [CLASS_NAME] with the following coverage:
- [List of methods to test]
- [Edge cases to consider]
- [Mock requirements]
- [Expected behaviors]

Test requirements:
- Use PHPUnit for backend / Jasmine for frontend
- Mock all external dependencies
- Test both success and failure scenarios
- Include edge cases and boundary conditions
- Achieve >90% code coverage

Please provide complete test suite with setup, teardown, and assertions.
```

### Integration Test Development
```
Create integration tests for [FEATURE_NAME] that verify:
- [End-to-end functionality]
- [API endpoint behavior]
- [Database interactions]
- [Authentication/authorization]

The tests should:
1. Use test database with fixtures
2. Test complete user workflows
3. Verify API responses and status codes
4. Include error scenarios
5. Clean up test data properly
```

## Security Implementation Templates

### Authentication Implementation
```
Implement JWT authentication for [SPECIFIC_FEATURE] with:
- [Authentication requirements]
- [Authorization rules]
- [Token management needs]
- [Security considerations]

Please include:
1. JWT token generation and validation
2. Authentication middleware/guards
3. Role-based access control
4. Token refresh mechanism
5. Security headers and CORS configuration
6. Rate limiting implementation
```

### Input Validation
```
Implement comprehensive input validation for [ENDPOINT/FORM] with:
- [List of validation rules]
- [Security considerations (XSS, SQL injection prevention)]
- [Business logic validation]
- [Error message requirements]

Validation should include:
1. Server-side validation (Symfony Validator)
2. Client-side validation (Angular Validators)
3. Sanitization of user inputs
4. Proper error responses
5. Security against common attacks
```

## Performance Optimization Templates

### Query Optimization
```
Optimize database queries for [SPECIFIC_FEATURE] to improve performance:
- [Current performance issues]
- [Expected load and usage patterns]
- [Specific queries that need optimization]

Please provide:
1. Optimized Doctrine queries with proper joins
2. Database indexes for improved performance
3. Caching strategy for frequently accessed data
4. Pagination implementation for large datasets
5. Performance benchmarks and measurements
```

### Frontend Performance
```
Optimize Angular application performance for [SPECIFIC_AREA] focusing on:
- [Performance bottlenecks identified]
- [Loading time requirements]
- [Memory usage considerations]
- [Bundle size optimization]

Optimizations should include:
1. Lazy loading for routes and modules
2. OnPush change detection strategy
3. TrackBy functions for ngFor loops
4. Image optimization and lazy loading
5. Bundle analysis and code splitting
```

## Deployment and DevOps Templates

### Docker Configuration
```
Create Docker configuration for [SERVICE_NAME] with:
- [Runtime requirements]
- [Environment variables needed]
- [Volume mounts and networking]
- [Multi-stage build requirements]

Please provide:
1. Dockerfile with multi-stage build
2. Docker Compose configuration for development
3. Production-ready container configuration
4. Health checks and monitoring setup
5. Environment-specific configurations
```

### CI/CD Pipeline
```
Create CI/CD pipeline for [DEPLOYMENT_TARGET] that includes:
- [Build requirements]
- [Testing stages]
- [Deployment environments]
- [Quality gates]

Pipeline should include:
1. Automated testing (unit, integration, e2e)
2. Code quality checks (linting, static analysis)
3. Security scanning
4. Build optimization
5. Deployment automation with rollback capability
```

## Documentation Templates

### API Documentation
```
Create comprehensive API documentation for [API_ENDPOINTS] including:
- [Endpoint descriptions]
- [Request/response examples]
- [Authentication requirements]
- [Error handling]

Documentation should include:
1. OpenAPI/Swagger specifications
2. Request/response schemas
3. Authentication examples
4. Error code explanations
5. Usage examples in multiple languages
```

### User Guide Creation
```
Create user documentation for [FEATURE_NAME] that explains:
- [Feature purpose and benefits]
- [Step-by-step usage instructions]
- [Common troubleshooting scenarios]
- [Best practices]

Documentation should be:
1. User-friendly with clear language
2. Include screenshots and examples
3. Cover different user roles
4. Provide troubleshooting guides
5. Be easily maintainable and updatable
```

## Code Review Templates

### Code Review Checklist
```
Review the following code for [FEATURE_NAME] focusing on:

**Functionality:**
- [ ] Code meets requirements
- [ ] Edge cases are handled
- [ ] Error handling is comprehensive
- [ ] Performance is acceptable

**Code Quality:**
- [ ] Follows project coding standards
- [ ] Is well-documented and readable
- [ ] Has appropriate test coverage
- [ ] Follows SOLID principles

**Security:**
- [ ] Input validation is proper
- [ ] No security vulnerabilities
- [ ] Authentication/authorization is correct
- [ ] Sensitive data is protected

**Architecture:**
- [ ] Follows established patterns
- [ ] Maintains separation of concerns
- [ ] Is maintainable and extensible
- [ ] Integrates well with existing code

Please provide specific feedback and suggestions for improvement.
```

## Troubleshooting Templates

### Bug Investigation
```
Investigate and fix the following bug in [COMPONENT/FEATURE]:

**Bug Description:**
[Detailed description of the issue]

**Steps to Reproduce:**
[Step-by-step reproduction steps]

**Expected Behavior:**
[What should happen]

**Actual Behavior:**
[What actually happens]

**Environment:**
[Browser, OS, versions, etc.]

Please provide:
1. Root cause analysis
2. Proposed solution with code changes
3. Test cases to prevent regression
4. Impact assessment
5. Deployment considerations
```

### Performance Issue Resolution
```
Diagnose and resolve performance issues in [SPECIFIC_AREA]:

**Performance Problem:**
[Description of performance issue]

**Current Metrics:**
[Load times, response times, resource usage]

**Target Metrics:**
[Desired performance levels]

**User Impact:**
[How this affects user experience]

Please provide:
1. Performance profiling results
2. Identified bottlenecks
3. Optimization recommendations
4. Implementation plan
5. Monitoring strategy
```

## Usage Guidelines

### Best Practices for AI Prompting

1. **Be Specific**: Always provide detailed requirements and context
2. **Include Examples**: Show expected input/output formats when possible
3. **Specify Constraints**: Mention any limitations or requirements
4. **Request Tests**: Always ask for comprehensive test coverage
5. **Consider Security**: Include security requirements in all prompts
6. **Maintain Consistency**: Use established patterns and conventions
7. **Document Decisions**: Ask for explanations of design choices
8. **Plan for Maintenance**: Request maintainable and extensible solutions

### Template Customization

These templates should be customized based on:
- Specific project requirements
- Team preferences and standards
- Technology stack updates
- Lessons learned from previous implementations

### Continuous Improvement

Regularly update these templates based on:
- Development team feedback
- AI tool capabilities evolution
- Project complexity growth
- Industry best practices changes

---

**Note**: These templates are living documents that should evolve with the project and team needs. Regular review and updates ensure they remain effective and relevant for AI-assisted development.


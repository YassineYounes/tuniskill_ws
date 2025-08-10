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



## Real-World Implementation Examples

Based on the TuniSkill platform development, here are practical examples of how these templates have been successfully applied:

### Example 1: Course Entity Implementation

**Prompt Used:**
```
Create a Symfony entity for Course with the following requirements:
- Basic course information (title, description, instructor, price, rating)
- Student enrollment data (student count, duration, level)
- Categorization (category, tags, language)
- Status management (isActive, isFeatured, timestamps)
- Media support (thumbnail, video preview URL)
- Learning outcomes (requirements, what you will learn)

Please include:
1. The entity class with proper annotations
2. Doctrine repository class with advanced queries
3. Methods for finding featured courses, searching, and filtering
4. Proper relationships and constraints

Follow Symfony best practices and use proper type hints.
```

**Key Implementation Details:**
- Used Doctrine ORM annotations for database mapping
- Implemented automatic timestamp management with PreUpdate lifecycle callbacks
- Created comprehensive repository methods for common queries (findActiveCourses, findFeaturedCourses, searchCourses)
- Added proper validation constraints and type hints
- Included JSON field support for tags array

**Lessons Learned:**
- Always include repository methods in entity creation prompts
- Specify lifecycle callbacks for automatic field management
- Consider search and filtering requirements from the beginning
- Use proper decimal types for monetary values

### Example 2: API Controller with Database Integration

**Prompt Used:**
```
Update the existing API controller to use real database data instead of mock data for the courses endpoint:
- Replace mock data with CourseRepository queries
- Maintain the same JSON response format
- Include all course fields in the response
- Add proper error handling for database operations
- Ensure CORS is properly configured

The response should include: id, title, description, instructor, price, rating, students, duration, level, category, thumbnail, isFeatured, tags, language, and createdAt.
```

**Implementation Highlights:**
- Successfully migrated from mock data to database queries
- Maintained API contract while improving data source
- Added proper type casting for numeric fields
- Implemented comprehensive error handling
- Preserved existing response format for frontend compatibility

**Best Practices Applied:**
- Dependency injection for repository services
- Proper data serialization in controller methods
- Consistent error response formats
- Type safety with explicit casting

### Example 3: Angular Service with API Integration

**Prompt Used:**
```
Create an Angular service for API communication that provides:
- HTTP client integration with proper headers
- Methods for testing connection, fetching courses, and health checks
- Loading state management with BehaviorSubject
- Comprehensive error handling with user-friendly messages
- TypeScript interfaces for type safety
- Environment-based API URL configuration

The service should:
1. Use HttpClient for API communication
2. Implement proper error handling with console logging
3. Include loading states for UI feedback
4. Use RxJS operators for data transformation
5. Support both development and production environments

Please provide the service class, interface definitions, and environment configuration.
```

**Key Features Implemented:**
- Comprehensive TypeScript interfaces for type safety
- Loading state management with reactive patterns
- Environment-based configuration support
- Proper error handling with logging
- Observable-based architecture for reactive programming

**Technical Decisions:**
- Used BehaviorSubject for loading state management
- Implemented proper error handling with catchError operator
- Created separate interfaces for API responses and domain models
- Added support for different environments (dev/prod)

### Example 4: Database Schema with Sample Data

**Prompt Used:**
```
Create a comprehensive database schema for the e-learning platform with:
- Course entity with all necessary fields for an online learning platform
- User entity with role-based access (student, instructor, admin)
- Category entity with hierarchical support (parent-child relationships)
- Proper relationships between entities
- Sample data loading command for development

Please provide:
1. Entity classes with proper Doctrine annotations
2. Repository classes with advanced query methods
3. Database migration setup
4. Sample data loading command
5. Proper indexing for performance
```

**Schema Design Decisions:**
- Used SQLite for development simplicity
- Implemented hierarchical categories with self-referencing relationships
- Created comprehensive user role system
- Added proper indexing for search and filtering operations
- Included audit fields (createdAt, updatedAt) for all entities

**Sample Data Strategy:**
- Created realistic course data across multiple categories
- Implemented proper data relationships
- Used Symfony Command for data loading
- Included variety in course levels, prices, and ratings

### Example 5: Frontend-Backend Connection Setup

**Prompt Used:**
```
Establish the connection between Angular frontend and Symfony backend:
- Configure CORS on the Symfony backend to allow Angular requests
- Set up Angular HTTP client with proper providers
- Create environment configuration for API URLs
- Implement API service with connection testing
- Add proper error handling and loading states
- Test the connection with real API endpoints

Requirements:
- CORS should allow requests from localhost on any port
- Angular should have proper HTTP client configuration
- Environment files for development and production
- Connection testing with user feedback
- Proper error handling for network issues
```

**Connection Architecture:**
- CORS configuration using nelmio/cors-bundle
- Angular HTTP client with interceptors support
- Environment-based API URL configuration
- Comprehensive error handling with user notifications
- Loading state management for better UX

**Testing Strategy:**
- API endpoint testing with curl commands
- Frontend connection testing with real API calls
- Error scenario testing (server down, network issues)
- Cross-origin request verification

## Advanced Prompting Strategies

### Context-Aware Development

When working on complex features, always provide comprehensive context:

```
Context: Working on TuniSkill e-learning platform
Current State: 
- Backend: Symfony 6.4 with Course, User, Category entities
- Frontend: Angular 18+ with Material Design
- Database: SQLite with sample data loaded
- API: RESTful endpoints for courses, health check, connection test

Task: [Specific development task]
Requirements: [Detailed requirements]
Constraints: [Any limitations or considerations]
Integration Points: [How this connects to existing code]
```

### Iterative Development Approach

Break complex features into smaller, manageable prompts:

1. **Planning Phase**: "Design the architecture for [feature]"
2. **Backend Phase**: "Implement the backend components"
3. **Frontend Phase**: "Create the frontend interface"
4. **Integration Phase**: "Connect frontend and backend"
5. **Testing Phase**: "Create comprehensive tests"
6. **Documentation Phase**: "Document the implementation"

### Error-Driven Development

When encountering issues, use structured problem-solving prompts:

```
Issue: [Specific error or problem]
Context: [What was being attempted]
Error Details: [Full error message and stack trace]
Environment: [Versions, configuration, setup details]
Attempted Solutions: [What has been tried already]

Please provide:
1. Root cause analysis
2. Step-by-step solution
3. Prevention strategies
4. Testing approach
5. Documentation updates needed
```

## Platform-Specific Considerations

### Symfony Best Practices Integration

When prompting for Symfony development:
- Always mention the specific Symfony version (6.4)
- Request proper use of dependency injection
- Ask for Doctrine best practices
- Include security considerations
- Request proper error handling

### Angular Development Guidelines

For Angular prompts:
- Specify Angular version (18+)
- Request standalone components when appropriate
- Ask for proper TypeScript typing
- Include Angular Material integration
- Request reactive programming patterns

### Database Design Principles

When working with database schemas:
- Consider performance implications
- Plan for scalability
- Include proper indexing
- Design for data integrity
- Plan migration strategies

## Quality Assurance Templates

### Code Review Integration

```
Review the following implementation for [feature] against these criteria:

**Functional Requirements:**
- [ ] Meets all specified requirements
- [ ] Handles edge cases appropriately
- [ ] Integrates properly with existing code
- [ ] Follows established patterns

**Code Quality:**
- [ ] Follows project coding standards
- [ ] Is well-documented and readable
- [ ] Has appropriate test coverage
- [ ] Uses proper error handling

**Performance:**
- [ ] Efficient database queries
- [ ] Proper caching where needed
- [ ] Optimized frontend rendering
- [ ] Minimal resource usage

**Security:**
- [ ] Input validation and sanitization
- [ ] Proper authentication/authorization
- [ ] No security vulnerabilities
- [ ] Follows security best practices

Provide specific feedback and improvement suggestions.
```

### Testing Strategy Templates

```
Create a comprehensive testing strategy for [feature] including:

**Unit Tests:**
- Test individual components/services in isolation
- Mock external dependencies
- Cover success and failure scenarios
- Achieve >90% code coverage

**Integration Tests:**
- Test component interactions
- Verify API endpoints
- Test database operations
- Validate error handling

**End-to-End Tests:**
- Test complete user workflows
- Verify UI functionality
- Test cross-browser compatibility
- Validate responsive design

**Performance Tests:**
- Load testing for API endpoints
- Frontend performance metrics
- Database query optimization
- Memory usage validation

Please provide test implementations and execution strategies.
```

## Maintenance and Evolution

### Documentation Updates

```
Update project documentation for [recent changes] including:

**Technical Documentation:**
- API endpoint documentation
- Database schema changes
- Architecture decisions
- Configuration updates

**User Documentation:**
- Feature usage guides
- Troubleshooting information
- FAQ updates
- Best practices

**Developer Documentation:**
- Setup instructions
- Development workflows
- Testing procedures
- Deployment guides

Ensure all documentation is current, accurate, and accessible.
```

### Refactoring Guidelines

```
Refactor [specific code area] to improve:

**Code Quality:**
- Reduce complexity and duplication
- Improve readability and maintainability
- Follow SOLID principles
- Update to modern patterns

**Performance:**
- Optimize database queries
- Improve caching strategies
- Reduce bundle sizes
- Enhance loading times

**Security:**
- Update dependencies
- Improve input validation
- Enhance authentication
- Fix security vulnerabilities

**Testing:**
- Improve test coverage
- Update test strategies
- Add missing test cases
- Improve test performance

Provide a detailed refactoring plan with implementation steps.
```

---

## Conclusion

These real-world examples demonstrate the practical application of AI prompting templates in developing the TuniSkill e-learning platform. The key to successful AI-assisted development lies in:

1. **Providing Clear Context**: Always include project background and current state
2. **Being Specific**: Detail exact requirements and expected outcomes
3. **Iterative Approach**: Break complex tasks into manageable pieces
4. **Quality Focus**: Always request tests, documentation, and error handling
5. **Continuous Learning**: Update templates based on experience and results

By following these patterns and continuously refining the prompting approach, development teams can significantly improve productivity while maintaining high code quality and system reliability.

The templates and examples provided here serve as a foundation that should be adapted and extended based on specific project needs, team preferences, and evolving best practices in the rapidly changing landscape of AI-assisted software development.



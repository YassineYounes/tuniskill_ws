# Contributing to TuniSkill

Thank you for your interest in contributing to TuniSkill! This document provides guidelines and information for contributors to help maintain code quality and project consistency.

## Table of Contents
- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [Development Setup](#development-setup)
- [Contributing Process](#contributing-process)
- [Coding Standards](#coding-standards)
- [Testing Guidelines](#testing-guidelines)
- [Commit Message Guidelines](#commit-message-guidelines)
- [Pull Request Process](#pull-request-process)
- [Issue Reporting](#issue-reporting)

## Code of Conduct

This project adheres to a code of conduct that we expect all contributors to follow. Please read and follow our [Code of Conduct](CODE_OF_CONDUCT.md) to help us maintain a welcoming and inclusive community.

## Getting Started

### Prerequisites
Before contributing, ensure you have the following installed:
- PHP 8.1 or higher
- Node.js 18+ and npm
- MySQL 8.0+ or PostgreSQL 13+
- Composer
- Git
- Docker (optional but recommended)

### Fork and Clone
1. Fork the repository on GitHub
2. Clone your fork locally:
   ```bash
   git clone https://github.com/YourUsername/tuniskill_ws.git
   cd tuniskill_ws
   ```
3. Add the upstream repository:
   ```bash
   git remote add upstream https://github.com/YassineYounes/tuniskill_ws.git
   ```

## Development Setup

### Backend Setup (Symfony)
1. Navigate to the backend directory:
   ```bash
   cd backend/tuniskill-api
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Configure environment:
   ```bash
   cp .env .env.local
   # Edit .env.local with your database credentials
   ```

4. Set up the database:
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   php bin/console doctrine:fixtures:load
   ```

5. Start the development server:
   ```bash
   symfony server:start
   ```

### Frontend Setup (Angular)
1. Navigate to the frontend directory:
   ```bash
   cd frontend/tuniskill-frontend
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Start the development server:
   ```bash
   ng serve
   ```

## Contributing Process

### 1. Choose an Issue
- Look for issues labeled `good first issue` for beginners
- Check if the issue is already assigned to someone
- Comment on the issue to express your interest

### 2. Create a Branch
Create a new branch for your work:
```bash
git checkout -b feature/your-feature-name
# or
git checkout -b bugfix/issue-number-description
```

### 3. Make Changes
- Write clean, maintainable code
- Follow the coding standards outlined below
- Add tests for new functionality
- Update documentation as needed

### 4. Test Your Changes
- Run backend tests: `php bin/phpunit`
- Run frontend tests: `ng test`
- Run linting: `npm run lint` (frontend) and `vendor/bin/php-cs-fixer fix` (backend)
- Test manually in the browser

### 5. Commit Your Changes
Follow our commit message guidelines (see below) and commit your changes:
```bash
git add .
git commit -m "feat: add user authentication system"
```

### 6. Push and Create Pull Request
```bash
git push origin feature/your-feature-name
```
Then create a pull request on GitHub.

## Coding Standards

### Backend (PHP/Symfony)
- Follow PSR-12 coding standards
- Use strict typing: `declare(strict_types=1);`
- Use proper type hints for all parameters and return types
- Write PHPDoc comments for all public methods
- Use dependency injection instead of static calls
- Follow Symfony best practices and conventions

**Example:**
```php
<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepositoryInterface;

final class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function findActiveUsers(): array
    {
        return $this->userRepository->findBy(['active' => true]);
    }
}
```

### Frontend (TypeScript/Angular)
- Follow Angular style guide
- Use TypeScript strict mode
- Use OnPush change detection strategy when possible
- Implement proper error handling
- Use reactive programming with RxJS
- Follow component/service separation

**Example:**
```typescript
@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.scss'],
  changeDetection: ChangeDetectionStrategy.OnPush
})
export class UserListComponent implements OnInit {
  users$ = this.userService.getUsers().pipe(
    catchError(error => {
      this.notificationService.showError('Failed to load users');
      return of([]);
    })
  );

  constructor(
    private readonly userService: UserService,
    private readonly notificationService: NotificationService,
    private readonly cdr: ChangeDetectorRef
  ) {}

  ngOnInit(): void {
    // Component initialization
  }
}
```

### General Guidelines
- Use meaningful variable and function names
- Keep functions small and focused (single responsibility)
- Avoid deep nesting (max 3 levels)
- Use early returns to reduce complexity
- Add comments for complex business logic
- Remove unused imports and variables

## Testing Guidelines

### Backend Testing
- Write unit tests for all services and utilities
- Write integration tests for controllers
- Use data providers for testing multiple scenarios
- Mock external dependencies
- Aim for >80% code coverage

**Example:**
```php
class UserServiceTest extends TestCase
{
    private UserService $userService;
    private MockObject $userRepository;

    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->userService = new UserService($this->userRepository);
    }

    public function testFindActiveUsers(): void
    {
        $expectedUsers = [new User(), new User()];
        $this->userRepository
            ->expects($this->once())
            ->method('findBy')
            ->with(['active' => true])
            ->willReturn($expectedUsers);

        $result = $this->userService->findActiveUsers();

        $this->assertSame($expectedUsers, $result);
    }
}
```

### Frontend Testing
- Write unit tests for components and services
- Test user interactions and edge cases
- Mock HTTP calls and external dependencies
- Use TestBed for component testing
- Write E2E tests for critical user flows

**Example:**
```typescript
describe('UserListComponent', () => {
  let component: UserListComponent;
  let fixture: ComponentFixture<UserListComponent>;
  let userService: jasmine.SpyObj<UserService>;

  beforeEach(() => {
    const userServiceSpy = jasmine.createSpyObj('UserService', ['getUsers']);

    TestBed.configureTestingModule({
      declarations: [UserListComponent],
      providers: [
        { provide: UserService, useValue: userServiceSpy }
      ]
    });

    fixture = TestBed.createComponent(UserListComponent);
    component = fixture.componentInstance;
    userService = TestBed.inject(UserService) as jasmine.SpyObj<UserService>;
  });

  it('should load users on init', () => {
    const mockUsers = [{ id: 1, name: 'John' }, { id: 2, name: 'Jane' }];
    userService.getUsers.and.returnValue(of(mockUsers));

    component.ngOnInit();

    component.users$.subscribe(users => {
      expect(users).toEqual(mockUsers);
    });
  });
});
```

## Commit Message Guidelines

We follow the [Conventional Commits](https://www.conventionalcommits.org/) specification:

### Format
```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

### Types
- `feat`: A new feature
- `fix`: A bug fix
- `docs`: Documentation only changes
- `style`: Changes that do not affect the meaning of the code
- `refactor`: A code change that neither fixes a bug nor adds a feature
- `perf`: A code change that improves performance
- `test`: Adding missing tests or correcting existing tests
- `chore`: Changes to the build process or auxiliary tools

### Examples
```
feat(auth): add JWT token refresh mechanism

fix(course): resolve video playback issue on mobile devices

docs(api): update authentication endpoint documentation

test(user): add unit tests for user registration service
```

## Pull Request Process

### Before Submitting
1. Ensure your branch is up to date with the main branch
2. Run all tests and ensure they pass
3. Run linting and fix any issues
4. Update documentation if necessary
5. Add or update tests for your changes

### Pull Request Requirements
1. Fill out the pull request template completely
2. Link to related issues
3. Provide clear description of changes
4. Include screenshots for UI changes
5. Ensure CI/CD pipeline passes

### Review Process
1. At least one maintainer must approve the PR
2. All CI checks must pass
3. No merge conflicts
4. Code follows project standards
5. Adequate test coverage

### After Approval
- Maintainers will merge the PR
- Delete your feature branch after merge
- Update your local repository:
  ```bash
  git checkout main
  git pull upstream main
  ```

## Issue Reporting

### Before Creating an Issue
1. Search existing issues to avoid duplicates
2. Check if the issue exists in the latest version
3. Gather relevant information (browser, OS, steps to reproduce)

### Issue Types
- **Bug Report**: Use the bug report template
- **Feature Request**: Use the feature request template
- **Documentation**: For documentation improvements
- **Question**: For general questions (consider using discussions first)

### Writing Good Issues
- Use clear, descriptive titles
- Provide detailed descriptions
- Include steps to reproduce (for bugs)
- Add screenshots or videos when helpful
- Specify your environment details

## Getting Help

If you need help with contributing:
- Check the documentation in the `docs/` directory
- Look at existing code for examples
- Ask questions in GitHub discussions
- Reach out to maintainers

## Recognition

Contributors will be recognized in:
- The project README
- Release notes for significant contributions
- GitHub contributors page

Thank you for contributing to TuniSkill! Your efforts help make online education more accessible and effective.


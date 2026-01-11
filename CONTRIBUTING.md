# Contributing to Edens Gröna Garden Service

Thank you for considering contributing to this project!

## How to Contribute

### Reporting Bugs

1. Check if the bug has already been reported
2. Include detailed steps to reproduce
3. Provide error messages and screenshots
4. Specify your environment (PHP version, OS, etc.)

### Suggesting Enhancements

1. Clearly describe the feature
2. Explain why it would be useful
3. Provide examples of how it would work

### Pull Requests

1. Fork the repository
2. Create a new branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Write or update tests
5. Update documentation
6. Commit your changes (`git commit -m 'Add amazing feature'`)
7. Push to the branch (`git push origin feature/amazing-feature`)
8. Open a Pull Request

## Development Guidelines

### Code Style

- Follow PSR-12 coding standards
- Use meaningful variable and function names
- Add comments for complex logic
- Keep functions small and focused

### Testing

```bash
# Run tests
php artisan test

# Run specific test
php artisan test --filter TestName
```

### Database Changes

- Always create migrations for schema changes
- Update seeders if needed
- Test migrations up and down

### Commit Messages

- Use present tense ("Add feature" not "Added feature")
- Use imperative mood ("Move cursor to..." not "Moves cursor to...")
- Limit first line to 72 characters
- Reference issues and pull requests

Example:
```
Add service image upload feature

- Implement file validation
- Add image optimization
- Update service resource

Fixes #123
```

## Development Setup

```bash
# Clone repository
git clone <repository-url>
cd laravel_garden_service

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database
php artisan migrate
php artisan db:seed

# Run development server
php artisan serve
```

## Contact

For questions:
- Email: info@edensgrona.se
- Phone: 076-049 28 28

## License

By contributing, you agree that your contributions will be licensed under the same license as the project.

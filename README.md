# Larave Make Files Tools

**It supports Laravel 9+ and PHP 8.1+**

## Description

This package is small cli tool for creating the Action class, DTO class and Service class.

## Installation

### Laravel

Require this package with composer using the following command:

```bash
  composer require thuraaung2493/laravel-make-files-tools@dev
```

## Usage

### To create DTO class

```bash
  php artisan make:dto NewUser --pest

  // created in App\DataObjects\NewUser.php & tests/Feature/DataObject/NewUserTest.php
```

### To create Action class

```bash
  php artisan make:action CreateUserAction --pest

  // created in App\Actions\CreateUserAction.php & tests/Feature/Actions/CreateUserActionTest.php
```

### To create Service class

```bash
  php artisan make:service NotificationService --pest

  // created in App\Services\NotificationService.php & tests/Feature/Services/NotificationServiceTest.php
```

# Laravel Keycloak Authentication

This Laravel project demonstrates integration with Keycloak for OpenID Connect (OIDC) authentication, enabling users to authenticate with Keycloak as the Identity Provider (IdP). User sessions are handled without database persistence, using Laravel sessions.

---

## Table of Contents

1. [Project Overview](#project-overview)
2. [Prerequisites](#prerequisites)
3. [Setup and Installation](#setup-and-installation)
4. [Environment Variables](#environment-variables)
5. [Keycloak Configuration](#keycloak-configuration)
6. [Usage](#usage)
7. [Project Structure](#project-structure)
8. [Troubleshooting](#troubleshooting)
9. [Contributing](#contributing)
10. [License](#license)

---

## Project Overview

This project implements user authentication using Keycloak as an OpenID Connect (OIDC) provider. Users are authenticated with Keycloak and returned to the Laravel application, where their session data (such as name and email) is stored in Laravel’s session.

---

## Prerequisites

- **Laravel**: Version 8.x or higher.
- **Keycloak**: Ensure Keycloak is installed and configured on your server.
- **PHP**: Version 7.4 or higher.
- **Composer**: Dependency manager for PHP.
- **Git**: For version control.

---

## Setup and Installation

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/your-repo/laravel-keycloak-auth.git
    cd laravel-keycloak-auth
    ```

2. **Install Dependencies**:
    ```bash
    composer install
    ```

3. **Create Environment File**:
    Copy the `.env.example` file to `.env` and configure it with your Keycloak and Laravel setup details.
    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

5. **Set Up Database (Optional)**:
    If using database features, configure database settings in `.env` and migrate:
    ```bash
    php artisan migrate
    ```

6. **Clear Configuration Cache**:
    ```bash
    php artisan config:clear
    php artisan cache:clear
    ```

7. **Run the Application**:
    ```bash
    php artisan serve
    ```

---

## Environment Variables

The following environment variables must be defined in `.env` for Keycloak integration.

```dotenv
# Keycloak Configuration
KEYCLOAK_BASE_URL=https://your-keycloak-server.com
KEYCLOAK_REALM=your-realm
KEYCLOAK_CLIENT_ID=your-client-id
KEYCLOAK_CLIENT_SECRET=your-client-secret
KEYCLOAK_REDIRECT_URI=http://127.0.0.1:8000/auth/callback

# Application URL
APP_URL=http://127.0.0.1:8000

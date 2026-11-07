# Web-Restomu: Elegant Restaurant Web Application ✨

![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue.svg?style=for-the-badge&logo=php) ![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20.svg?style=for-the-badge&logo=laravel) ![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4.svg?style=for-the-badge&logo=tailwindcss&logoColor=white) ![Vite](https://img.shields.io/badge/Vite-646CFF.svg?style=for-the-badge&logo=vite&logoColor=white) ![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)

Welcome to **Web-Restomu**, an elegantly designed web application for a restaurant that allows customers to explore a diverse menu, discover featured dishes, and conveniently make online table reservations. Built on the robust Laravel framework, it offers a seamless user experience with a modern, responsive interface crafted using Tailwind CSS and Alpine.js. 🍽️

## 📋 Table of Contents

*   [Project Overview](#project-overview)
*   [Features](#features-🌟)
*   [Tech Stack](#tech-stack-💻)
*   [Installation](#installation-⚙️)
    *   [Prerequisites](#prerequisites)
    *   [Setup Steps](#setup-steps)
*   [Usage](#usage-🚀)
*   [Project Structure](#project-structure-📁)
*   [Contributing](#contributing-🤝)
*   [License](#license-📄)
*   [Important Links](#important-links-🔗)
*   [Footer](#footer)

## Project Overview

Web-Restomu is a sophisticated web platform aimed at enhancing the dining experience by providing an intuitive way for restaurant patrons to interact with a restaurant's offerings. It features a dynamic menu, highlighting chef's specials, and a straightforward reservation system. The application is designed for performance and ease of maintenance, making it an ideal digital storefront for any modern restaurant. 📱

## Features 🌟

*   **Elegant Homepage**: Showcases a hero section and displays a selection of featured menu items to entice visitors. (Implemented in `resources/views/welcome.blade.php` and `app/Http/Controllers/HomeController.php`)
*   **Comprehensive Menu Display**: Allows customers to browse the full menu, neatly organized by categories such as Starters, Main Course, Dessert, and Signature Drinks. Each item includes a description, price, and image. (Implemented in `resources/views/menu.blade.php` and `app/Http/Controllers/HomeController.php`)
*   **Online Reservation System**: Provides a user-friendly form for booking tables, capturing essential details like name, email, phone, preferred date, time, and number of guests. Includes basic validation. (Implemented in `resources/views/reservation.blade.php` and `app/Http/Controllers/ReservationController.php`)
*   **Responsive Design**: Utilizes Tailwind CSS to ensure a beautiful and functional experience across all devices, from desktops to mobile phones. (Evident in `resources/views/layouts/app.blade.php` and `resources/css/app.css`)
*   **Interactive Elements**: Uses Alpine.js for lightweight JavaScript interactivity, such as the mobile navigation toggle and temporary success messages. (Included via CDN in `resources/views/layouts/app.blade.php`)
*   **Database Seeding**: Populates the database with initial categories and menu items, making setup easier. (Defined in `database/seeders/DatabaseSeeder.php`)
*   **Configurable Environment**: Supports various database connections (SQLite, MySQL, PostgreSQL) and other services via `.env` and configuration files. (`.env.example`, `config/*.php`)

## Tech Stack 💻

*   **Backend Framework**: [Laravel](https://laravel.com/) (PHP)
*   **Frontend Styling**: [Tailwind CSS](https://tailwindcss.com/) 
*   **Frontend Interactivity**: [Alpine.js](https://alpinejs.dev/) (via CDN)
*   **Build Tool**: [Vite.js](https://vitejs.dev/)
*   **Package Manager (PHP)**: [Composer](https://getcomposer.org/)
*   **Package Manager (JavaScript)**: [NPM](https://www.npmjs.com/)
*   **Database**: SQLite (default), MySQL, PostgreSQL, etc. (configurable)
*   **Other Libraries**: Axios (HTTP client), Concurrently (for dev scripts)

## Installation ⚙️

To get Web-Restomu up and running on your local machine, follow these steps:

### Prerequisites

Ensure you have the following installed:
*   **PHP** (version 8.2 or higher)
*   **Composer**
*   **Node.js** (LTS version recommended)
*   **npm** (comes with Node.js)
*   A web server (e.g., Apache, Nginx, or Laravel Sail/PHP's built-in server)

### Setup Steps

1.  **Clone the repository**: Fork and clone the repository to your local machine.

    ```bash
    git clone https://github.com/FAIZ-ADI-PRANAWA/Web-Restomu.git
    cd Web-Restomu
    ```

2.  **Install PHP Dependencies**: Install Composer dependencies.

    ```bash
    composer install
    ```

3.  **Environment Configuration**: Copy the example environment file and generate an application key.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Database Setup**: The `.env.example` file defaults to SQLite. If you want to use SQLite, ensure a `database.sqlite` file exists. For other databases (e.g., MySQL), update your `.env` file with the correct credentials.

    ```bash
    # For SQLite (optional: creates the file if it doesn't exist)
    touch database/database.sqlite
    
    # Run database migrations to create tables
    php artisan migrate
    
    # Seed the database with initial menu and category data
    php artisan db:seed
    ```

5.  **Install Node.js Dependencies**: Install frontend dependencies.

    ```bash
    npm install
    ```

6.  **Compile Frontend Assets**: Compile your assets for development or production.

    ```bash
    # For development (watches for changes)
    npm run dev
    
    # For production (optimizes assets)
    npm run build
    ```

    *Alternatively, you can run the `composer setup` script, which automates many of these steps:*

    ```bash
    composer setup
    ```

7.  **Serve the Application**: Start the Laravel development server.

    ```bash
    php artisan serve
    ```

    Your application will typically be accessible at `http://localhost:8000`. 🌐

    *For a combined development experience with hot reloading and queue monitoring, use the provided `composer dev` script:*

    ```bash
    composer dev
    ```

## Usage 🚀

Once the application is running, you can interact with it via your web browser:

*   **Homepage**: Navigate to `http://localhost:8000` to see the hero section and featured menus.
*   **Browse Menu**: Click on "Menu" in the navigation or visit `http://localhost:8000/menu` to view all available dishes categorized.
*   **Make a Reservation**: Click on "Reservasi" in the navigation or scroll to the reservation section on the homepage, or directly visit `http://localhost:8000/reservation` to fill out the reservation form. After submitting, you will receive a success message.

**Example User Flow:**
1.  A customer lands on the Restomu homepage.
2.  They browse the `Menu Favorit` (Featured Menus) and are intrigued.
3.  They click `Lihat Semua Menu` (View All Menus) to explore the full `Daftar Menu` (Menu List) categorized.
4.  Impressed by the selection, they decide to make a reservation.
5.  They navigate to the reservation form, fill in their details (name, email, phone, date, time, guests, optional message).
6.  Upon `Konfirmasi Reservasi` (Confirm Reservation), they receive a `Sukses!` (Success!) message indicating their reservation has been received, with a note that the restaurant will contact them for confirmation.

## Project Structure 📁

Here's a high-level overview of the project directory structure:

```
Web-Restomu/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Handles incoming requests (HomeController, ReservationController)
│   ├── Models/                 # Eloquent models for database interaction (Category, Menu, User)
│   └── Providers/              # Service providers
├── bootstrap/                  # Application bootstrapping
├── config/                     # Configuration files for various services (app, database, mail, queue, session, etc.)
├── database/
│   ├── factories/              # Factories for generating test data
│   ├── migrations/             # Database schema migrations (users, cache, jobs, restomu tables)
│   └── seeders/                # Database seeders (DatabaseSeeder for initial menu/category data)
├── public/                     # Web server entry point (index.php), assets
├── resources/
│   ├── css/                    # Tailwind CSS entry point (app.css)
│   ├── js/                     # JavaScript entry point (app.js), bootstrap.js for Axios
│   └── views/                  # Blade templates (layouts/app.blade.php, menu.blade.php, reservation.blade.php, welcome.blade.php)
├── routes/                     # Defines application routes (web.php, console.php)
├── tests/                      # Unit and Feature tests
├── .env.example                # Example environment configuration
├── composer.json               # PHP dependencies and scripts
├── package.json                # Node.js dependencies and scripts
├── vite.config.js              # Vite build configuration
└── README.md                   # This file
```

## Contributing 🤝

We welcome contributions to the Web-Restomu project! If you have suggestions for improvements, new features, or bug fixes, please feel free to:

1.  Fork the repository.
2.  Create a new branch (`git checkout -b feature/your-feature-name`).
3.  Make your changes.
4.  Commit your changes (`git commit -m 'Add new feature X'`).
5.  Push to the branch (`git push origin feature/your-feature-name`).
6.  Open a Pull Request.

Please ensure your code adheres to the project's coding standards and includes appropriate tests if applicable.

## License 📄

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). ✨

## Important Links 🔗

*   **Repository URL**: [https://github.com/FAIZ-ADI-PRANAWA/Web-Restomu](https://github.com/FAIZ-ADI-PRANAWA/Web-Restomu)

## Footer

Made with ❤️ for elegant dining experiences.

© 2024 Web-Restomu. All rights reserved. | Created by FAIZ-ADI-PRANAWA

Fork, star, and contribute to make Web-Restomu even better! ✨


---
**<p align="center">Generated by [ReadmeCodeGen](https://www.readmecodegen.com/)</p>**
# Obituary Management Platform

## Overview

The Obituary Management Platform is a Laravel-based web application designed to allow users to submit, view, and share obituaries. It provides an intuitive interface for posting detailed obituaries with fields such as name, date of birth, date of death, content, and author. The platform also includes functionality for social media sharing, making it easier to distribute obituary information.

## Features

-   **Submit Obituaries**: Users can fill out a form to post obituaries with detailed information.
-   **View Obituaries**: A visually appealing display of submitted obituaries sorted by the date of death.
-   **Social Media Sharing**: Share obituary details on Facebook, Twitter, and LinkedIn.
-   **Validation**: Robust input validation to ensure data integrity.
-   **Notifications**: Animated toast notifications for success and error messages.
-   **Meta Tags**: Open Graph and Twitter meta tags for social media previews.

## Technology Stack

-   **Backend**: Laravel (PHP Framework)
-   **Frontend**: Blade templating engine, Toastr.js for notifications
-   **Database**: MySQL
-   **Styling**: CSS, Bootstrap (for responsive design)

## Installation and Setup

1. Clone the repository:

    ```bash
    git clone https://github.com/JohnAlex1900/obituary_platform.git
    cd obituary_platform
    ```

2. Install Dependencies:
   composer install
   npm install

3. Create a .env file:
   cp .env.example .env

4. Generate Application Key:
   php artisan key:generate

5. Run Database Migrations:
   php artisan migrate

6. Start the local development server:
   php artisan serve

## Usage

1. Navigate to http://127.0.0.1:8000 to access the obituary submission form.
2. Submit obituaries using the form fields.
3. View the list of obituaries at /obituaries.
4. Share obituaries on social media by clicking the share buttons.

## Development Process

1. **Form Creation**: A form for obituary submission was developed using Blade and Bootstrap.
2. **Controller Logic**: Controllers were set up to handle form submission and database interaction.
3. **Database Schema**: The obituaries table was created with fields for name, dates, content, author, and slug.
4. **Notifications**: Toastr.js was integrated for success and error notifications.
5. **Social Media Sharing**: Open Graph and Twitter meta tags were configured for optimized sharing.

## Contribution

Contributions are welcome! Please submit a pull request or open an issue for any feature requests or bug fixes.

## License

This project is open-sourced under the MIT License.

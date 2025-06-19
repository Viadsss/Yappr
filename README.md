# 📱 Yappr – Laravel Social Media App

A **social media platform** built with **Laravel 12**. Yappr allows users to create posts, react to content, manage personal information, and explore posts from others in a minimal, intuitive interface.

**Demo Video:** https://www.youtube.com/watch?v=g1pAo3D7hf0

![Yappr Screenshot 1](/screenshots/yaps.png)
![Yappr Screenshot 2](/screenshots/profile.png)


## ✨ Features

-   User registration and authentication
-   Create, edit, and delete your own postsg
-   React to other posts
-   View all posts from all users
-   Update personal profile information
-   Mobile-first, responsive design

## 🛠 Installation

1. **Open your terminal** and navigate to the directory where you'd like to store the project:

    ```bash
    cd <PATH TO PROJECT LOCATION>
    ```

2. **Clone the repository**:

    ```bash
    git clone https://github.com/YourUsername/Yappr.git
    ```

3. **Navigate into the project folder**:

    ```bash
    cd Yappr
    ```

4. **Ensure you are on the latest `main` branch**:

    ```bash
    git checkout main
    git pull origin main
    ```

5. **Install backend and frontend dependencies**:

    ```bash
    composer install
    npm install
    ```

6. **Set up the environment file**:

    ```bash
    cp .env.example .env
    ```

7. **Configure the `.env` file**:

    ```env
    APP_URL=http://localhost:8000
    ```

8. **Create the SQLite database file**:

    ```bash
    touch database/database.sqlite
    ```

9. **Generate the application key**:

    ```bash
    php artisan key:generate
    ```

10. **Link the storage folder** (for uploaded avatars, images, etc.):

    ```bash
    php artisan storage:link
    ```

11. **\[Optional] Seed the storage directory** (for sample avatars or media):

    ```bash
    php artisan storage:seed
    ```

12. **Run database migrations**:

    ```bash
    php artisan migrate
    ```

13. **\[Optional] Seed the database with sample users and posts**:

    ```bash
    php artisan db:seed
    ```

14. **Start the local development server**:

    ```bash
    php artisan serve
    ```

# Contribution Documentation

## 🔧 Prerequisites

Before contributing, ensure you have the following installed:

- [Git](https://git-scm.com/)
- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/)
- [Node.js & npm](https://nodejs.org/)
- [MySQL](https://www.mysql.com/)

For detailed installation instructions, refer to the [Laravel Installation Guide](https://laravel.com/docs/12.x#creating-a-laravel-project).

👉 **Note:** You can also use [Laravel Herd](https://herd.laravel.com/) as an alternative local development environment.

---

## 🚀 Getting Started

1. **Open your command prompt** and navigate to the location where you want to store the project:
    
    ```bash
    cd <PATH TO PROJECT LOCATION>
    ```
    
2. **Clone the repository** directly into the current directory:
    
    ```bash
    git clone https://github.com/Viadsss/Yappr.git
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
    
5. **Install dependencies**:
    
    ```bash
    composer install
    npm install
    ```
    
6. **Set up environment file**:
    
    ```bash
    cp .env.example .env
    ```
    
7. **Generate application key**:
    
    ```bash
    php artisan key:generate
    ```
    
8. **Run database migrations** (if applicable):
    
    ```bash
    php artisan migrate
    ```
    
9. **Start the local development server**:
    
    ```bash
    php artisan serve
    ```
    

Open [http://localhost:8000](http://localhost:8000) in your browser to see the application.

---

## 🤝 Contributing

### 🛠 Contribution Guide

#### 1. Ensure you are on the `main` branch:

```bash
git checkout main
git pull origin main
```

#### 2. Create a new branch based on the latest `main`:

```bash
git checkout -b <dev-name>-<task-desc>
```

##### 🐑 **Branch Naming Convention**

**Format:** `[dev-name]-[task-desc]`

|Placeholder|Description|
|---|---|
|`[dev-name]`|Your nickname|
|`[task-desc]`|Short, hyphenated task description|

**Example:** `john-login-system`

#### 3. Start working on your local copy by adding/editing/removing files.

#### 4. After making changes, pull the latest changes (to avoid merge conflict), commit, and push to the repository:

##### ✅ **Commit Message Format**

```bash
git pull origin main
git add .
git commit -m "<type>: <short-description>"
git push origin <current-branch-name>
```

**Commit Types:**

- `feat` → A new feature
- `fix` → A bug fix
- `refactor` → Code changes that neither fix bugs nor add features
- `chore` → Maintenance tasks like updating dependencies or configs
- `docs` → Documentation updates

**Example:**

```bash
git commit -m "feat: add login functionality"
```

#### 5. Open a Pull Request (PR) on GitHub

- Navigate to the [Yappr Repo](https://github.com/Viadsss/Yappr) and go to the **Pull Requests** tab.
- Ensure the PR follows this structure: `base: main <- compare: yourname-taskdesc`.
- Provide a detailed description following the **Pull Request Description Format** below.
- **Notify the team** via the Messenger Group Chat.

---

### 📝 Pull Request Description Format

```
### Changes Includes:
- Add: (List files added + reason)
- Modify: (List files modified + reason)
- Remove: (List files deleted + reason)

### 📦 Packages Installed:
- [Package Name] - [Reason for adding]

### ❓ Questions/Issues:
- (Free format for any concerns)

### ✅ Tasks to do (if WIP upon PR):
- (List remaining tasks)
```

---

## 📚 Learn More

For further details on Laravel development, check out these resources:

- 📄 **[Laravel 12.x Documentation](https://laravel.com/docs/12.x)** – The official Laravel documentation.
- 🎥 **[Laracasts](https://laracasts.com/)** – High-quality video tutorials on Laravel.
- 🎧 **[Laravel YouTube Channel](https://www.youtube.com/c/Laravel)** – Free video content about Laravel features.
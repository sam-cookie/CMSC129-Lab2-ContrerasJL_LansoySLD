# UPV ORG HUB

*A centralized directory for University of the Philippines Visayas student organizations.*

UPV Org Hub is a web application designed for UPV constituents to explore, discover, and learn more about the various student organizations within the University of the Philippines Visayas. Users can add, edit, delete, or view existing orgs.

> By Julia Contreras and Sam Lansoy

---

## Purpose

The goal of this project is to:

- Provide a centralized directory of UPV organizations
- Help students discover orgs that match their interests
- Make organization information more accessible and organized
- Support engagement within the UPV community

---

## Installation & Setup

### 1. Clone the repository

```bash
git clone https://github.com/sam-cookie/CMSC129-Lab2-ContrerasJL_LansoySLD
cd CMSC129-Lab2-ContrerasJL_LansoySLD
```

### 2. Install dependencies

```bash
npm install
```

### 3. Environment setup

Copy the `.env.example` file and configure it:

```bash
cp .env.example .env
php artisan key:generate
```

## Database Setup

### 1. Install PostgreSQL

Make sure PostgreSQL is installed and running on your computer.

### 2. Create a Database

**Option A:** Using pgAdmin

1. Open pgAdmin
2. Right-click **Databases**
3. Click **Create** → **Databases**
4. Enter: Database name: `upv_orgs_db`
5. Click **Save**

**Option B:** Using SQL

Run this in Query Tool:
```bash
CREATE DATABASE upv_orgs_db;
```

### 3. Configure `.env` file

Open your Laravel project and update the `.env` file:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=upv_orgs_db
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 4. Install PHP PostgreSQL Driver

Make sure `pdo_pgsql` is enabled in your PHP installation in `php.ini`:

```bash
extension=pdo_pgsql
extenshion=pgsql
```

Then restart your server (Laragon/XAMPP/etc)

### 5. Verify Connection

Run:

```bash
php artisan tinker
```

Then:

```bash
DB::connection()->getDatabaseName();
```

Your expected output should be `"upv_orgs_db"`

## Migration Commands 

*Migrations are used to create and manage database tables.*

### 1. Run Migrations

This command will create all the tables from your database.

```bash
php artisan migrate
```

### 2. Refresh Database (Reset + Re-run)

This commmand drops all tabless and recreates them.

```bash
php artisan migrate:refresh
```

### 3. Fresh Migration (Clean Reset)

To reset the data base run this command to delete all tables and run migrations again.

```bash
php artisan migrate:fresh
```

### 4. Run Seeders

Seeders populates database with sample data.

To run all seeding files:

```bash
php artisan db:seed
```

To run a specific seeder file (recommended for our project):

```bash
php artisan db:seed --class=OrganizationSeeder
```

### 5. Run both Migration and Seeder

```bash
php artisan migrate:fresh --seed
```

## Application Preview
| Dashboard |
| :---: |
| <img src="screenshots/dashboard.png">|
| Archived |
 <img src="screenshots/archived.png">|
| Search / Filter |
| <img src="screenshots/search.png">| 
| Add New Organization |
| <img src="screenshots/addorg.png"> |
| Edit Organization |
| <img src="screenshots/editorg.png"> |
---

## Features
* **Centralized Directory** – A single hub to browse and discover all registered UPV student organizations.
* **Organization Profiles** – View key details at a glance, including **Organization Type**, **Member Count**, and **Contact Email**.
* **Full CRUD Functionality** – Ability to **Create** new entries, **Read** details, **Update** existing information, and **Delete** organizations from the list.
* **Archive System** – A dedicated "Archived" section to manage and view organizations.
* **Real-time Search** – Integrated search functionality to filter through the list and find specific organizations instantly.

## MVC Architecture & Project Structure

This project follows the **Model-View-Controller (MVC)** design pattern to ensure a clean separation of business logic and views:

### Models (The Data)
Located in `app/Models/`, these files handle the database logic and data structure.
* **`Organization.php`**: The primary model for managing UPV student organization data and attributes.

### Views (The Interface)
Located in `resources/views/`, these define the user interface using Laravel's Blade engine.
* **`orgs/`**: Contains `index.blade.php` (the main directory) and `archived.blade.php` (the archive view).
* **`components/`**: Reusable Blade components like `modal-add-org.blade.php` and `toast.blade.php` to keep the code **DRY (Don't Repeat Yourself)**.
* **`layouts/`**: The master `app.blade.php` file providing a consistent structure across all pages.

### Controllers (The Logic)
Located in `app/Http/Controllers/`.
* **`OrgController.php`**: The "brain" of the app, managing data flow between the models and views, including search, storage, and update logic.

Here is the structured project layout:

```text
UPV-Org-Hub/
├── app/
│   ├── Http/
│   │   └── Controllers/      # OrgController.php (C in MVC)
│   └── Models/               # Organization.php (M in MVC)
├── database/
│   ├── migrations/           # Database table definitions
│   └── seeders/              # OrganizationSeeder.php for sample data
├── public/                   # Compiled assets (CSS/JS)
├── resources/
│   └── views/                # (V in MVC)
│       ├── components/       # Reusable Modals and Toasts
│       ├── layouts/          # Master app layout
│       └── orgs/             # index and archived Blade templates
├── routes/
│   └── web.php               # Application routes
├── screenshots/              # Project documentation images
├── .env                      # Environment configuration (Private)
└── README.md                 # Project documentation

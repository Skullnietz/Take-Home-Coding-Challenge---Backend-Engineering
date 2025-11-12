# 🧩 Profile Service API – Laravel 7

A simple RESTful service for user profile management.  
Built with **Laravel 7**, designed to run locally or be exposed publicly via **ngrok**.

---

## ⚙️ Requirements

- PHP **7.2+**
- Extensions: `pdo_sqlite`, `sqlite3`
- Composer
- (Optional) [ngrok](https://ngrok.com) — to share your local server publicly

---

## 🏗️ Local Setup & Execution

### 1️⃣ Clone the repository

git clone https://github.com/<your-username>/profile-service.git
cd profile-service


### 2️⃣ Install dependencies


composer install

### 3️⃣ Configure the environmentCopy the example file:Bashcp .env.example .env
Edit .env and set the database connection to SQLite:DB_CONNECTION=sqlite
Create the SQLite file and run migrations:Bashmkdir database 2>nul
type nul > database\database.sqlite
php artisan migrate

### 4️⃣ Run the Laravel serverBashphp artisan serve --host=127.0.0.1 --port=8000
Then open your browser:http://127.0.0.1:8000/api/profiles

#### 🌍 Expose the API Publicly with ngrokStart ngrok (in another terminal):Bashngrok http 8000
Copy the public forwarding URL, for example:https://xyz-1234.ngrok-free.appReplace that base URL in the examples below.

#### 🧪 API EndpointsMethodEndpointDescriptionPOST/api/profilesCreate a new profileGET/api/profile/{id}Get a profile by IDGET/api/profilesList all profilesPATCH/api/profile/{id}Update profile fields

#### 🟢 Create a ProfilePowerShell$body = @{ username="john_doe"; email="john@example.com"; bio="Software engineer" }| ConvertTo-JsonInvoke-RestMethod -Method Post -Uri "[https://XYZ-1234.ngrok-free.app/api/profiles](https://XYZ-1234.ngrok-free.app/api/profiles)" -Body $body -ContentType "application/json" -Headers @{Accept="application/json"}

#### 🟡 List ProfilesPowerShellInvoke-RestMethod "[https://XYZ-1234.ngrok-free.app/api/profiles](https://XYZ-1234.ngrok-free.app/api/profiles)" -Headers @{Accept="application/json"}

#### 🔵 Get Profile by IDPowerShellInvoke-RestMethod "[https://XYZ-1234.ngrok-free.app/api/profile/1](https://XYZ-1234.ngrok-free.app/api/profile/1)" -Headers @{Accept="application/json"}

#### 🟠 Update a ProfilePowerShell$update = @{ bio="Senior developer" } | ConvertTo-JsonInvoke-RestMethod -Method Patch -Uri "[https://XYZ-1234.ngrok-free.app/api/profile/1](https://XYZ-1234.ngrok-free.app/api/profile/1)" -Body $update -ContentType "application/json" -Headers @{Accept="application/json"}

#### These requests can also be tested easily using Postman with headers: Accept: application/json and Content-Type: application/json.✅ Example ResponsesPOST /api/profilesJSON{ "id": 1 }
GET /api/profile/1JSON{
  "id": 1,
  "username": "john_doe",
  "email": "john@example.com",
  "bio": "Software engineer",
  "created_at": "2025-11-11T10:30:00Z",
  "updated_at": "2025-11-11T10:30:00Z"
}

#### 🧠 Technical NotesFramework: Laravel 7.30.7Database: SQLite (file-based, portable). Easily switchable to PostgreSQL/MySQL for production.Routes defined in routes/api.phpModel: App\ProfileController: App\Http\Controllers\ProfileControllerValidation: username and email must be uniqueAPI throttling: default 60 requests/minute

#### 🧾 Verification StepsOpen the active ngrok URL, e.g. https://xyz-1234.ngrok-free.app/api/profiles.Send a POST request to create a profile.Refresh the GET /api/profiles endpoint — the new record should appear.Fetch the profile by ID with GET /api/profile/1.Update it using PATCH and confirm the change.

#### 📦 Project Structure

app/
 ├── Http/
 │    └── Controllers/ProfileController.php
 ├── Profile.php
database/
 ├── migrations/
 │    └── 2025_11_10_000000_create_profiles_table.php
 └── database.sqlite
routes/
 └── api.php

### 👤 Author: Carlos Guízar

#### 🟢 Submitted as a Backend Engineering Take-Home Challenge⚠️ Important Note:The ngrok session is temporary — once it expires, the public URL stops working.If you try to access the endpoints and the URL no longer responds, please contact me directly so I can reactivate ngrok and share a new live URL for testing.

To restart it locally:Bashngrok http 8000
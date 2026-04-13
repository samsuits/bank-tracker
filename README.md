# 💰 Bank Tracker (MVP)

A simple Laravel-based app to track multiple bank accounts and their transactions.

---

## 🚀 Features

* 🏦 Add and manage bank accounts
* 💸 Add transactions (credit / debit)
* 🧾 Categorize transactions
* 🔄 Automatic balance calculation per bank
* 📋 View transaction history
* 🎨 Basic UI using Tailwind CSS
* 🐳 Docker-based local setup

---

## 🧱 Tech Stack

* Laravel (Backend)
* Blade + Tailwind CSS (Frontend)
* MySQL (Database)
* Docker (Development environment)

---

## ⚙️ Setup Instructions

### 1. Clone repository

```bash
git clone https://github.com/samsuits/bank-tracker.git
cd bank-tracker
```

---

### 2. Start Docker

```bash
docker-compose up --build -d
```

---

### 3. Enter container

```bash
docker exec -it bank_app bash
```

---

### 4. Install dependencies

```bash
composer install
npm install
```

---

### 5. Setup environment

```bash
cp .env.example .env
php artisan key:generate
```

Update DB config in `.env`:

```env
DB_HOST=db
DB_DATABASE=bank_tracker
DB_USERNAME=root
DB_PASSWORD=root
```

---

### 6. Run migrations & seed

```bash
php artisan migrate
php artisan db:seed
```

---

### 7. Build frontend

```bash
npm run build
```

---

### 8. Access app

http://localhost:8000

---

## 📊 Current Data Model

### Banks

* name
* account_number
* current_balance

### Transactions

* bank_id
* category_id
* date
* description
* type (credit / debit)
* amount
* balance

### Categories

* name

---

## 🔮 Planned Features

* Filters (bank, category, date)
* Dashboard & reports
* CSV import (bank statements)
* Source/Destination tracking (from/to)
* React frontend

---

## 📌 Notes

* Uses `type + amount` instead of separate credit/debit fields
* Designed as MVP — simple and extendable

---

## 📄 License

MIT

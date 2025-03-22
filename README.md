# 🛠️ Mini E-Commerce Backend API (Laravel 9.x)

This is the backend REST API built with **Laravel 9** to support a mini e-commerce app. It includes **products**, **cart system**, **checkout history**, and uses JWT Authentication.

---

## 🟢 Features:
- JWT Auth (Register, Login)
- Product CRUD (name, description, price, image URL)
- Cart System: Add, View, Remove, Checkout
- **Quantity merge logic** (merge if product exists in cart)
- Checkout history tracking (see past checkouts)
- Secure APIs using **JWT token**
- Ready for **Flutter + Dio** frontend integration 🚀

---

## 🔧 Technologies Used:
- Laravel 9.x
- MySQL
- PHP 8+
- Tymon JWT Auth
- Artisan CLI

---

## ⚙️ Setup Instructions

### 🗂️ If you downloaded the ZIP file manually:
1. Unzip the project folder.
2. Open terminal inside the project directory.
3. Run:
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

### OR Clone via Git:
```bash
git clone https://github.com/minrandom/mini-ecommerce-api.git
cd mini-ecommerce-api
composer install
cp .env.example .env
php artisan key:generate
```

### Setup `.env`:
```env
DB_DATABASE=mini_ecommerce
DB_USERNAME=root
DB_PASSWORD=your_password
```

Run migrations:
```bash
php artisan migrate
```

(Optional) Seed Dummy Data:
```bash
mysql -u root -p your_db < products_toys_seed.sql
mysql -u root -p your_db < users_seed.sql
```

Start API server:
```bash
php artisan serve
```

---

## 🔐 JWT Auth:
- **Register**: `/api/register`
- **Login**: `/api/login`
- All `/cart` & `/cart/history` routes require **Authorization: Bearer <token>**

---

## 📌 API Endpoints

### 🛍️ Products:
| Method | Endpoint              | Description        |
|--------|------------------------|--------------------|
| GET    | /api/products          | List all products  |
| GET    | /api/products/{id}     | Get product detail |
| POST   | /api/products          | Create product     |
| PUT    | /api/products/{id}     | Update product     |
| DELETE | /api/products/{id}     | Delete product     |

---

### 🛒 Cart:
| Method | Endpoint                | Description                         |
|--------|--------------------------|-------------------------------------|
| POST   | /api/cart/add            | Add to cart (auto merge quantity)   |
| GET    | /api/cart                | View all cart items (in cart)       |
| DELETE | /api/cart/remove/{id}    | Remove cart item by ID              |
| POST   | /api/cart/checkout       | Checkout & move items to history    |

---

### 📜 Checkout History:
| Method | Endpoint                | Description                   |
|--------|--------------------------|-------------------------------|
| GET    | /api/cart/history        | View past checkout history    |

---

## 🚀 Next Recommended Steps:
- CI/CD with GitHub Actions
- Dockerize API for deployment
- Setup Swagger docs for API reference


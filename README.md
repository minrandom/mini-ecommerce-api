
# 🛠️ Mini E-Commerce Backend API (Laravel 9.x)

This is the backend REST API built with **Laravel 9** to support a mini e-commerce app. It handles **products**, **cart operations**, and connects to a MySQL database.

## 🟢 Features:
- Product CRUD (name, description, price, image URL)
- Cart System: Add, View, Remove
- **Quantity merge logic** (when same product is added again)
- API ready for frontend integration via **Flutter + Dio**

## 🔧 Technologies Used:
- Laravel 9.x
- MySQL
- PHP 8+
- Artisan CLI 


## ⚙️ Setup Instructions:

## 🗂️ If you downloaded the ZIP file manually:

1. Unzip the project folder.
2. Open terminal inside the project directory.
3. Run the following:


## OR you Can Clone the project
git clone

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```


### 1. Clone & Install Dependencies
```bash
git clone <repo_url>
cd mini-ecommerce-api
composer install
```

### 2. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Setup Database
Edit `.env`:
```env
DB_DATABASE=mini_ecommerce
DB_USERNAME=root
DB_PASSWORD=your_password
```

Run migrations:
```bash
php artisan migrate
```

### (Optional) Seed Dummy Data
```bash
php artisan db:seed
```

### 4. Serve API
```bash
php artisan serve
```


## 📌 API Endpoints

### 🛍️ Products:
| Method | Endpoint              | Description        |
|--------|------------------------|--------------------|
| GET    | /api/products          | List all products  |
| GET    | /api/products/{id}     | Get product detail |
| POST   | /api/products          | Create product     |
| PUT    | /api/products/{id}     | Update product     |
| DELETE | /api/products/{id}     | Delete product     |

### 🛒 Cart:
| Method | Endpoint                | Description                         |
|--------|--------------------------|-------------------------------------|
| POST   | /api/cart/add            | Add to cart (auto merge quantity)   |
| GET    | /api/cart                | View all cart items                 |
| DELETE | /api/cart/remove/{id}    | Remove cart item by ID              |



## 🚀 Next Steps:
- Add JWT Authentication (Laravel tymon/jwt-auth)
- Secure cart routes with middleware
- Dockerize API for deployment





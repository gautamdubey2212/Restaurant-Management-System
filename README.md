# Restaurant-Management-System

# Restaurant-Management-System
# 🍽️ Restaurant Management System

A simple and efficient **Restaurant Management System** built using **PHP, MySQL, and Bootstrap**.
This project allows admins to manage menu items with full CRUD operations and image upload support.

---

## 📌 Features

* 🔐 Admin Login System (Session-based authentication)
* ➕ Add Menu Items (Name, Description, Price, Category, Image)
* 📄 View Menu (Card Layout + Table View)
* ✏️ Edit Menu Items
* ❌ Delete Menu Items (with confirmation)
* 🖼️ Image Upload System
* 📤 Export Data (CSV / Excel)

---

## 🛠️ Technologies Used

* Frontend: HTML, CSS, Bootstrap
* Backend: PHP
* Database: MySQL
* Server: XAMPP

---

## 📂 Project Structure

```
/project-folder
│── Db.php
│── Login.php
│── Home.php
│── add_menu.php
│── view_menu.php
│── Edit.php
│── Delete.php
│── export.php
│── Excel.php
│── uploads/
```

---

## ⚙️ How It Works

1. Admin logs into the system
2. Admin adds new food items using the form
3. Data is stored in the MySQL database
4. Images are uploaded to the `uploads/` folder
5. Menu items are displayed in card and table format
6. Admin can edit or delete items anytime

---

## 🗄️ Database Structure

### Table: `Menu`

| Column Name | Type                              |
| ----------- | --------------------------------- |
| id          | INT (Primary Key, Auto Increment) |
| ItemName    | VARCHAR                           |
| Description | TEXT                              |
| Price       | INT                               |
| Category    | VARCHAR                           |
| Image       | VARCHAR                           |

---

## 🚀 Setup Instructions

1. Install **XAMPP**
2. Start **Apache** and **MySQL**
3. Copy project folder into:

   ```
   C:\xampp\htdocs\
   ```
4. Create a database in phpMyAdmin
5. Import your SQL file
6. Run project in browser:

   ```
   http://localhost/project-folder
   ```

---

## 🔐 Security Features

* Prepared Statements (SQL Injection Protection)
* Session-based Authentication
* Basic Input Handling

---

## 🔮 Future Improvements

* 🛒 Order Management System
* 💳 Payment Integration
* 📊 Admin Dashboard
* 👥 Multiple User Roles
* ⭐ Ratings & Reviews

---

## 👨‍💻 Author

* Developed by: Gautam Dubey
* Project Type: Academic / Learning Project

---

## ⭐ Note

This project is built for **learning and practice purposes**.
You can enhance it further to make it production-ready.

---

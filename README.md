# OPTISTOCK2.0
Re haciendo Optistock

## Database Setup

If you are using MySQL, you can create the user table with the following commands:

```sql
CREATE DATABASE optistock_db;
USE optistock_db;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
```


This repository now organizes the site under the `public/` folder with `index.php`, `login.php` and `register.php`.
The registration and login pages use PHP to store and consultar datos de usuario en MySQL.

Para ejecutar el proyecto de manera local puedes usar el servidor incorporado de PHP:

```bash
php -S localhost:8000 -t public
```

Luego abre `http://localhost:8000` en tu navegador.

This repository includes a basic index, login and registration page built with plain HTML and CSS.


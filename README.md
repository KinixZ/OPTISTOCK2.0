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

This repository includes a basic index, login and registration page built with plain HTML and CSS.

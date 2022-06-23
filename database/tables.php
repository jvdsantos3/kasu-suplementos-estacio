<?php
include 'connect.php';

try {
    // Tabela user 
    $sql = [];

    $sql[] = "CREATE TABLE IF NOT EXISTS users(
    usr_id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    usr_name VARCHAR(100) NOT NULL,
    usr_email VARCHAR(50) NOT NULL,
    usr_birthdate VARCHAR(20) NOT NULL,
    usr_password VARCHAR(255) NOT NULL,
    usr_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

    //Alter table users
    $sql[] = "ALTER TABLE users ADD  usr_gender ENUM('Feminino','Masculino','Outro');";
    $sql[] = "ALTER TABLE users ADD usr_phone VARCHAR(15) NOT NULL;";
    $sql[] = "ALTER TABLE users ADD usr_admin BIT";

    //Tabela product
    $sql[] = "CREATE TABLE IF NOT EXISTS products(
    pdc_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    pdc_name VARCHAR(100) NOT NULL, 
    pdc_price DECIMAL(10, 2) NOT NULL, 
    pdc_photo BLOB NULL, 
    pdc_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

    //ALTER TABLE product
    $sql[] = "ALTER TABLE products MODIFY COLUMN pdc_photo VARCHAR(200);";
    $sql[] = "ALTER TABLE products ADD COLUMN pdc_desc VARCHAR(200);";

    //Tabela orders 
    $sql[] = "CREATE TABLE IF NOT EXISTS orders(
    ord_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    ord_usr_id INTEGER NOT NULL, 
    ord_pdc_id INTEGER NOT NULL,
    ord_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

    //Chaves estrangeiras 
    $sql[] = "ALTER TABLE orders 
    ADD CONSTRAINT ord_fk_usr FOREIGN KEY(ord_usr_id) REFERENCES users(usr_id);";

    $sql[] = "ALTER TABLE orders 
    ADD CONSTRAINT ord_fk_pdc FOREIGN KEY(ord_pdc_id) REFERENCES products(pdc_id);";

    foreach ($sql as $q) {
        $conn->query($q);
    }

    $conn->close();
    echo "Tabelas criadas com sucesso!";
} catch (Throwable $th) {
    echo $th;
}
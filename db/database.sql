DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS purchases;
DROP TABLE IF EXISTS product_instances;


CREATE TABLE users (
	user_username TEXT UNIQUE,
    user_password TEXT,
    user_address TEXT,
    PRIMARY KEY (user_username)
);

CREATE TABLE products (
    product_id TEXT DEFAULT (lower(hex(randomblob(16)))),
    product_name TEXT,
    product_desc TEXT,
    product_price DOUBLE,
    product_img TEXT,
    PRIMARY KEY (product_id)
);

CREATE TABLE purchases (
	purchase_time TIMESTAMP,
    purchase_id TEXT DEFAULT (lower(hex(randomblob(16)))),
    PRIMARY KEY (purchase_id)
);

CREATE TABLE product_instances(
	product_quantity INT,

    purchase_time TIMESTAMP,
    product_id TEXT,

    FOREIGN KEY (purchase_time) REFERENCES purchases(purchase_time),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
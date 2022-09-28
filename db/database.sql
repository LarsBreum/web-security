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

INSERT INTO users (user_username, user_password, user_address)
    VALUES ('admin', 'pass', 'address 1');
INSERT INTO users (user_username, user_password, user_address)
    VALUES ('Lars', 'pass', 'address 2');
INSERT INTO users (user_username, user_password, user_address)
    VALUES ('Rasmus', 'pass', 'address 3');

INSERT INTO products (product_name, product_desc, product_price, product_img)
    VALUES ('Product 1', 'A very good product', 10000, "#");
INSERT INTO products (product_name, product_desc, product_price, product_img)
    VALUES ('Product 2', 'An even better product', 15000, "#");
INSERT INTO products (product_name, product_desc, product_price, product_img)
    VALUES ('Product 3', 'The best product', 20000, "#");
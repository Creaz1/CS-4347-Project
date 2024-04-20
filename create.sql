CREATE TABLE supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phoneNumber CHAR(12)
);

CREATE TABLE ingredient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    type VARCHAR(255),
    quantity INT,
    unit VARCHAR(50),
    supplierID INT,
    FOREIGN KEY (supplierID) references supplier(id)
);

CREATE TABLE dish (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    category VARCHAR(50),
    price FLOAT,
    cookingTime INT
);

CREATE TABLE chef (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phoneNumber CHAR(12)
);

CREATE TABLE appliance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    status VARCHAR(50)
);

CREATE TABLE used_in (
    ingredient_id INT,
    dish_id INT,
    FOREIGN KEY (ingredient_id) references ingredient(id),
    FOREIGN KEY (dish_id) references dish(id),
    PRIMARY KEY (ingredient_id, dish_id)
);

CREATE TABLE cooked_by (
    dish_id INT,
    chef_id INT,
    FOREIGN KEY (dish_id) references dish(id),
    FOREIGN KEY (chef_id) references chef(id),
    PRIMARY KEY (dish_id, chef_id)
);

CREATE TABLE cooked_using (
    dish_id INT,
    appliance_id INT,
    FOREIGN KEY (dish_id) references dish(id),
    FOREIGN KEY (appliance_id) references appliance(id),
    PRIMARY KEY (dish_id, appliance_id)
);

CREATE TABLE used_by (
    appliance_id INT,
    chef_id INT,
    FOREIGN KEY (appliance_id) references appliance(id),
    FOREIGN KEY (chef_id) references chef(id),
    PRIMARY KEY (appliance_id, chef_id)
);

CREATE TABLE diet_restrictions (
    ingredient_id INT,
    restriction VARCHAR(255),
    FOREIGN KEY (ingredient_id) references ingredient(id),
    PRIMARY KEY (ingredient_id, restriction)
);

CREATE TABLE specialties (
    chef_id INT,
    specialty VARCHAR(255),
    PRIMARY KEY (chef_id, specialty)
);

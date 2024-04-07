INSERT INTO supplier (id, name, email, phoneNumber) VALUES
(1, 'Fresh Produce Co.', 'freshproduce@example.com', '123-456-7890'),
(2, 'Quality Meats Ltd.', 'qualitymeats@example.com', '456-789-0123'),
(3, 'Seafood Delights Inc.', 'seafooddelights@example.com', '789-012-3456'),
(4, 'Bakery Bliss LLC', 'bakerybliss@example.com', '012-345-6789'),
(5, 'Dairy Direct', 'dairydirect@example.com', '234-567-8901'),
(6, 'Grains & More', 'grainsandmore@example.com', '567-890-1234'),
(7, 'Herb Haven', 'herbhaven@example.com', '890-123-4567'),
(8, 'Saucy Supplies', 'saucysupplies@example.com', '345-678-9012'),
(9, 'Sweet Treats Co.', 'sweettreats@example.com', '678-901-2345'),
(10, 'Healthy Harvest', 'healthyharvest@example.com', '901-234-5678');

INSERT INTO ingredient (id, name, type, quantity, unit, supplierID) VALUES
(1, 'Salt', 'Spice', 10, 'lbs', 3),
(2, 'Pepper', 'Spice', 8, 'oz', 5),
(3, 'Garlic', 'Produce', 15, 'bulbs', 7),
(4, 'Onion', 'Produce', 20, 'lbs', 2),
(5, 'Chicken', 'Meat', 30, 'lbs', 1),
(6, 'Beef', 'Meat', 25, 'lbs', 4),
(7, 'Shrimp', 'Seafood', 12, 'lbs', 9),
(8, 'Salmon', 'Seafood', 18, 'lbs', 6),
(9, 'Tomato', 'Produce', 22, 'lbs', 8),
(10, 'Lettuce', 'Produce', 28, 'lbs', 10),
(11, 'Basil', 'Herb', 5, 'oz', 3),
(12, 'Thyme', 'Herb', 3, 'oz', 5),
(13, 'Parsley', 'Herb', 4, 'oz', 7),
(14, 'Cumin', 'Spice', 6, 'oz', 2),
(15, 'Paprika', 'Spice', 7, 'oz', 1),
(16, 'Coriander', 'Spice', 4, 'oz', 9),
(17, 'Turmeric', 'Spice', 3, 'oz', 6),
(18, 'Bay leaves', 'Spice', 8, 'oz', 4),
(19, 'Oregano', 'Spice', 5, 'oz', 10),
(20, 'Ginger', 'Produce', 10, 'lbs', 3),
(21, 'Carrot', 'Produce', 15, 'lbs', 5),
(22, 'Celery', 'Produce', 12, 'lbs', 7),
(23, 'Bell pepper', 'Produce', 20, 'lbs', 2),
(24, 'Mushrooms', 'Produce', 18, 'lbs', 1),
(25, 'Potatoes', 'Produce', 25, 'lbs', 9),
(26, 'Flour', 'Baking', 30, 'lbs', 6),
(27, 'Sugar', 'Baking', 40, 'lbs', 4),
(28, 'Butter', 'Dairy', 15, 'lbs', 10),
(29, 'Milk', 'Dairy', 20, 'gallons', 3),
(30, 'Cheese', 'Dairy', 10, 'lbs', 5),
(31, 'Eggs', 'Dairy', 50, 'count', 7),
(32, 'Olive oil', 'Oil', 15, 'liters', 2),
(33, 'Vinegar', 'Oil', 12, 'liters', 1),
(34, 'Soy sauce', 'Sauce', 18, 'gallons', 9),
(35, 'Worcestershire', 'Sauce', 10, 'gallons', 6),
(36, 'Ketchup', 'Sauce', 20, 'gallons', 4),
(37, 'Mustard', 'Sauce', 15, 'gallons', 10),
(38, 'Mayonnaise', 'Sauce', 10, 'gallons', 3),
(39, 'Honey', 'Sweetener', 25, 'lbs', 5),
(40, 'Maple syrup', 'Sweetener', 20, 'liters', 7),
(41, 'Rice', 'Grain', 30, 'lbs', 2),
(42, 'Pasta', 'Grain', 25, 'lbs', 1),
(43, 'Bread', 'Grain', 40, 'loaves', 9),
(44, 'Tortillas', 'Grain', 35, 'dozen', 6),
(45, 'Noodles', 'Grain', 20, 'lbs', 4),
(46, 'Quinoa', 'Grain', 15, 'lbs', 10),
(47, 'Tofu', 'Protein', 10, 'lbs', 3),
(48, 'Tempeh', 'Protein', 8, 'lbs', 5),
(49, 'Seitan', 'Protein', 5, 'lbs', 7),
(50, 'Lentils', 'Protein', 12, 'lbs', 2);

INSERT INTO dish (id, name, category, price, cookingTime) VALUES
(1, 'Grilled Chicken Salad', 'Salad', 12.99, 20),
(2, 'Spaghetti Bolognese', 'Pasta', 14.99, 30),
(3, 'Beef Stir Fry', 'Main Course', 16.99, 25),
(4, 'Vegetable Curry', 'Vegetarian', 11.99, 35),
(5, 'Salmon Fillet', 'Seafood', 18.99, 25),
(6, 'Margherita Pizza', 'Pizza', 10.99, 20),
(7, 'Beef Burger', 'Burger', 13.99, 25),
(8, 'Chicken Alfredo', 'Pasta', 15.99, 30),
(9, 'Tofu Stir Fry', 'Vegetarian', 12.99, 25),
(10, 'Shrimp Scampi', 'Seafood', 17.99, 20),
(11, 'Caesar Salad', 'Salad', 9.99, 15),
(12, 'Ratatouille', 'Vegetarian', 13.99, 35),
(13, 'Mushroom Risotto', 'Pasta', 14.99, 30),
(14, 'Fish and Chips', 'Seafood', 16.99, 25),
(15, 'BBQ Chicken Pizza', 'Pizza', 12.99, 20),
(16, 'Classic Cheeseburger', 'Burger', 11.99, 25),
(17, 'Vegetable Pad Thai', 'Vegetarian', 12.99, 25),
(18, 'Lobster Ravioli', 'Seafood', 20.99, 30),
(19, 'Margherita Panini', 'Sandwich', 8.99, 15),
(20, 'Vegetable Fajitas', 'Mexican', 14.99, 25);

INSERT INTO chef (id, name, email, phoneNumber) VALUES
(1, 'Michael Smith', 'michael.smith@example.com', '111-222-3333'),
(2, 'Sarah Johnson', 'sarah.johnson@example.com', '444-555-6666'),
(3, 'David Brown', 'david.brown@example.com', '777-888-9999'),
(4, 'Emily Davis', 'emily.davis@example.com', '000-111-2222'),
(5, 'James Wilson', 'james.wilson@example.com', '333-444-5555'),
(6, 'Jessica Martinez', 'jessica.martinez@example.com', '666-777-8888'),
(7, 'Daniel Taylor', 'daniel.taylor@example.com', '999-000-1111'),
(8, 'Laura Anderson', 'laura.anderson@example.com', '222-333-4444'),
(9, 'Matthew Thomas', 'matthew.thomas@example.com', '555-666-7777'),
(10, 'Jennifer Garcia', 'jennifer.garcia@example.com', '888-999-0000');

INSERT INTO appliance (id, name, status) VALUES
(1, 'Oven', 'Functional'),
(2, 'Stove', 'Functional'),
(3, 'Refrigerator', 'Functional'),
(4, 'Microwave', 'Functional'),
(5, 'Dishwasher', 'Functional'),
(6, 'Blender', 'Functional'),
(7, 'Toaster', 'Functional'),
(8, 'Coffee Maker', 'Functional'),
(9, 'Food Processor', 'Functional'),
(10, 'Mixer', 'Functional'),
(11, 'Deep Fryer', 'Functional'),
(12, 'Grill', 'Functional'),
(13, 'Juicer', 'Functional'),
(14, 'Rice Cooker', 'Functional'),
(15, 'Slow Cooker', 'Functional'),
(16, 'Waffle Maker', 'Functional'),
(17, 'Panini Press', 'Functional'),
(18, 'Electric Kettle', 'Functional'),
(19, 'Pressure Cooker', 'Functional'),
(20, 'Ice Cream Maker', 'Non-Functional');

INSERT INTO used_in (ingredient_id, dish_id) VALUES
(1, 1),   -- Salt used in Grilled Chicken Salad
(3, 1),   -- Garlic used in Grilled Chicken Salad
(9, 1),   -- Tomato used in Grilled Chicken Salad
(10, 1),  -- Lettuce used in Grilled Chicken Salad
(11, 1),  -- Basil used in Grilled Chicken Salad
(27, 2),  -- Sugar used in Spaghetti Bolognese
(28, 2),  -- Butter used in Spaghetti Bolognese
(42, 2),  -- Pasta used in Spaghetti Bolognese
(9, 3),   -- Tomato used in Beef Stir Fry
(4, 3),   -- Onion used in Beef Stir Fry
(6, 3),   -- Beef used in Beef Stir Fry
(22, 3),  -- Celery used in Beef Stir Fry
(21, 3),  -- Carrot used in Beef Stir Fry
(41, 4),  -- Rice used in Vegetable Curry
(4, 4),   -- Onion used in Vegetable Curry
(22, 4),  -- Celery used in Vegetable Curry
(9, 4),   -- Tomato used in Vegetable Curry
(20, 4),  -- Ginger used in Vegetable Curry
(23, 5),  -- Bell pepper used in Salmon Fillet
(8, 5),   -- Salmon used in Salmon Fillet
(1, 5),   -- Salt used in Salmon Fillet
(14, 6),  -- Cumin used in Margherita Pizza
(15, 6),  -- Paprika used in Margherita Pizza
(42, 6),  -- Pasta used in Margherita Pizza
(28, 7),  -- Butter used in Beef Burger
(30, 7),  -- Cheese used in Beef Burger
(2, 7),   -- Pepper used in Beef Burger
(31, 7),  -- Eggs used in Beef Burger
(5, 7),   -- Chicken used in Beef Burger
(9, 8),   -- Tomato used in Chicken Alfredo
(28, 8),  -- Butter used in Chicken Alfredo
(42, 8),  -- Pasta used in Chicken Alfredo
(5, 8),   -- Chicken used in Chicken Alfredo
(1, 9),   -- Salt used in Tofu Stir Fry
(20, 9),  -- Ginger used in Tofu Stir Fry
(23, 9),  -- Bell pepper used in Tofu Stir Fry
(22, 9),  -- Celery used in Tofu Stir Fry
(21, 9),  -- Carrot used in Tofu Stir Fry
(7, 10),  -- Shrimp used in Shrimp Scampi
(8, 10),  -- Salmon used in Shrimp Scampi
(2, 10),  -- Pepper used in Shrimp Scampi
(42, 10), -- Pasta used in Shrimp Scampi
(1, 11),  -- Salt used in Caesar Salad
(10, 11), -- Lettuce used in Caesar Salad
(31, 11), -- Eggs used in Caesar Salad
(32, 11), -- Olive oil used in Caesar Salad
(39, 12), -- Honey used in Ratatouille
(20, 12), -- Ginger used in Ratatouille
(9, 12),  -- Tomato used in Ratatouille
(23, 12), -- Bell pepper used in Ratatouille
(22, 12), -- Celery used in Ratatouille
(42, 13), -- Pasta used in Mushroom Risotto
(24, 13), -- Mushrooms used in Mushroom Risotto
(28, 13), -- Butter used in Mushroom Risotto
(1, 13),  -- Salt used in Mushroom Risotto
(8, 14),  -- Salmon used in Fish and Chips
(1, 14),  -- Salt used in Fish and Chips
(43, 14), -- Bread used in Fish and Chips
(24, 14), -- Mushrooms used in Fish and Chips
(42, 15), -- Pasta used in BBQ Chicken Pizza
(5, 15),  -- Chicken used in BBQ Chicken Pizza
(28, 15), -- Butter used in BBQ Chicken Pizza
(15, 15), -- Paprika used in BBQ Chicken Pizza
(14, 16), -- Cumin used in Classic Cheeseburger
(2, 16),  -- Pepper used in Classic Cheeseburger
(4, 16),  -- Onion used in Classic Cheeseburger
(22, 16), -- Celery used in Classic Cheeseburger
(28, 17), -- Butter used in Vegetable Pad Thai
(1, 17),  -- Salt used in Vegetable Pad Thai
(20, 17), -- Ginger used in Vegetable Pad Thai
(4, 17),  -- Onion used in Vegetable Pad Thai
(21, 17), -- Carrot used in Vegetable Pad Thai
(8, 18),  -- Salmon used in Lobster Ravioli
(9, 18),  -- Tomato used in Lobster Ravioli
(42, 18), -- Pasta used in Lobster Ravioli
(5, 18),  -- Chicken used in Lobster Ravioli
(1, 19),  -- Salt used in Margherita Panini
(30, 19), -- Cheese used in Margherita Panini
(10, 19), -- Lettuce used in Margherita Panini
(32, 19), -- Olive oil used in Margherita Panini
(9, 20),  -- Tomato used in Vegetable Fajitas
(4, 20),  -- Onion used in Vegetable Fajitas
(21, 20), -- Carrot used in Vegetable Fajitas
(22, 20), -- Celery used in Vegetable Fajitas
(23, 20), -- Bell pepper used in Vegetable Fajitas
(19, 20); -- Oregano used in Vegetable Fajitas

INSERT INTO cooked_by (dish_id, chef_id) VALUES
(1, 1),   -- Grilled Chicken Salad cooked by Michael Smith
(2, 2),   -- Spaghetti Bolognese cooked by Sarah Johnson
(3, 3),   -- Beef Stir Fry cooked by David Brown
(4, 4),   -- Vegetable Curry cooked by Emily Davis
(5, 5),   -- Salmon Fillet cooked by James Wilson
(6, 6),   -- Margherita Pizza cooked by Jessica Martinez
(7, 7),   -- Beef Burger cooked by Daniel Taylor
(8, 8),   -- Chicken Alfredo cooked by Laura Anderson
(9, 9),   -- Tofu Stir Fry cooked by Matthew Thomas
(10, 10), -- Shrimp Scampi cooked by Jennifer Garcia
(11, 1),  -- Caesar Salad cooked by Michael Smith
(12, 2),  -- Ratatouille cooked by Sarah Johnson
(13, 3),  -- Mushroom Risotto cooked by David Brown
(14, 4),  -- Fish and Chips cooked by Emily Davis
(15, 5),  -- BBQ Chicken Pizza cooked by James Wilson
(16, 6),  -- Classic Cheeseburger cooked by Jessica Martinez
(17, 7),  -- Vegetable Pad Thai cooked by Daniel Taylor
(18, 8),  -- Lobster Ravioli cooked by Laura Anderson
(19, 9),  -- Margherita Panini cooked by Matthew Thomas
(20, 10); -- Vegetable Fajitas cooked by Jennifer Garcia

INSERT INTO cooked_using (dish_id, appliance_id) VALUES
(1, 1),   -- Grilled Chicken Salad cooked using Oven
(2, 2),   -- Spaghetti Bolognese cooked using Stove
(3, 3),   -- Beef Stir Fry cooked using Refrigerator
(4, 4),   -- Vegetable Curry cooked using Microwave
(5, 5),   -- Salmon Fillet cooked using Dishwasher
(6, 6),   -- Margherita Pizza cooked using Blender
(7, 7),   -- Beef Burger cooked using Toaster
(8, 8),   -- Chicken Alfredo cooked using Coffee Maker
(9, 9),   -- Tofu Stir Fry cooked using Food Processor
(10, 10), -- Shrimp Scampi cooked using Mixer
(11, 1),  -- Caesar Salad prepared using Oven
(12, 2),  -- Ratatouille prepared using Stove
(13, 3),  -- Mushroom Risotto prepared using Refrigerator
(14, 4),  -- Fish and Chips prepared using Microwave
(15, 5),  -- BBQ Chicken Pizza prepared using Dishwasher
(16, 6),  -- Classic Cheeseburger prepared using Blender
(17, 7),  -- Vegetable Pad Thai prepared using Toaster
(18, 8),  -- Lobster Ravioli prepared using Coffee Maker
(19, 9),  -- Margherita Panini prepared using Food Processor
(20, 10); -- Vegetable Fajitas prepared using Mixer

INSERT INTO used_by (appliance_id, chef_id) VALUES
(1, 1),   -- Oven used by Michael Smith
(2, 2),   -- Stove used by Sarah Johnson
(3, 3),   -- Refrigerator used by David Brown
(4, 4),   -- Microwave used by Emily Davis
(5, 5),   -- Dishwasher used by James Wilson
(6, 6),   -- Blender used by Jessica Martinez
(7, 7),   -- Toaster used by Daniel Taylor
(8, 8),   -- Coffee Maker used by Laura Anderson
(9, 9),   -- Food Processor used by Matthew Thomas
(10, 10), -- Mixer used by Jennifer Garcia
(1, 2),   -- Oven used by Sarah Johnson
(2, 3),   -- Stove used by David Brown
(3, 4),   -- Refrigerator used by Emily Davis
(4, 5),   -- Microwave used by James Wilson
(5, 6),   -- Dishwasher used by Jessica Martinez
(6, 7),   -- Blender used by Daniel Taylor
(7, 8),   -- Toaster used by Laura Anderson
(8, 9),   -- Coffee Maker used by Matthew Thomas
(9, 10),  -- Food Processor used by Jennifer Garcia
(10, 1); -- Mixer used by Michael Smith

INSERT INTO diet_restrictions (ingredient_id, restriction) VALUES
(1, 'Gluten-Free'),    -- Salt
(2, 'Dairy-Free'),     -- Pepper
(3, 'Vegetarian'),     -- Garlic
(4, 'Vegan'),          -- Onion
(5, 'Keto'),           -- Chicken
(6, 'Halal'),          -- Beef
(7, 'Low Sodium'),     -- Shrimp
(8, 'Nut-Free'),       -- Salmon
(9, 'Low Carb'),       -- Tomato
(10, 'Organic'),       -- Lettuce
(14, 'Gluten-Free'),      -- Cumin
(15, 'Vegetarian'),       -- Paprika
(16, 'Vegan'),            -- Coriander
(20, 'Gluten-Free'),      -- Ginger
(21, 'Vegetarian'),       -- Carrot
(42, 'Gluten-Free'),      -- Pasta
(47, 'Vegetarian'),       -- Tofu
(48, 'Vegetarian'),       -- Tempeh
(49, 'Vegan'),            -- Seitan

INSERT INTO specialties (chef_id, specialty) VALUES
(1, 'Salads'),          -- Michael Smith specializes in Salads
(2, 'Pasta'),           -- Sarah Johnson specializes in Pasta
(3, 'Stir Fry'),        -- David Brown specializes in Stir Fry
(4, 'Curries'),         -- Emily Davis specializes in Curries
(5, 'Seafood'),         -- James Wilson specializes in Seafood
(6, 'Pizza'),           -- Jessica Martinez specializes in Pizza
(7, 'Burgers'),         -- Daniel Taylor specializes in Burgers
(8, 'Italian Cuisine'), -- Laura Anderson specializes in Italian Cuisine
(9, 'Asian Cuisine'),   -- Matthew Thomas specializes in Asian Cuisine
(10, 'Mexican Cuisine'),-- Jennifer Garcia specializes in Mexican Cuisine
(1, 'Grilled Dishes'),  -- Michael Smith also specializes in Grilled Dishes
(2, 'Italian Cuisine'), -- Sarah Johnson also specializes in Italian Cuisine
(3, 'Asian Cuisine'),   -- David Brown also specializes in Asian Cuisine
(4, 'French Cuisine'),  -- Emily Davis also specializes in French Cuisine
(5, 'Seafood'),         -- James Wilson also specializes in Seafood
(6, 'Pizza'),           -- Jessica Martinez also specializes in Pizza
(7, 'Burgers'),         -- Daniel Taylor also specializes in Burgers
(8, 'French Cuisine'),  -- Laura Anderson also specializes in French Cuisine
(9, 'Mexican Cuisine'), -- Matthew Thomas also specializes in Mexican Cuisine
(10, 'Vegetarian Dishes'); -- Jennifer Garcia also specializes in Vegetarian Dishes
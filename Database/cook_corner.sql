-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 03:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cook_corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergic_food`
--

CREATE TABLE `allergic_food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allergic_food`
--

INSERT INTO `allergic_food` (`id`, `name`, `picture`) VALUES
(1, 'Peanuts', NULL),
(2, 'Tree Nuts', NULL),
(3, 'Shellfish', NULL),
(4, 'Fish', NULL),
(5, 'Dairy', NULL),
(6, 'Wheat', NULL),
(7, 'Soy', NULL),
(8, 'Eggs', NULL),
(9, 'Gluten', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chef_applications`
--

CREATE TABLE `chef_applications` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `description`, `duration`, `price`, `instructor_id`) VALUES
(1, 'Basic Cooking', 'Introduction to basic cooking techniques.', '4 weeks', '150.00', 2001),
(2, 'Advanced Baking', 'Advanced techniques for baking.', '6 weeks', '200.00', 2002),
(3, 'International Cuisine', 'Learn dishes from various international cuisines.', '8 weeks', '250.00', 2003),
(4, 'Vegetarian Cooking', 'Focus on vegetarian recipes.', '5 weeks', '180.00', 2004),
(5, 'Pastry Arts', 'Techniques for creating fine pastries.', '4 weeks', '220.00', 2005);

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_type`
--

CREATE TABLE `cuisine_type` (
  `id` int(11) NOT NULL,
  `cuisine` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuisine_type`
--

INSERT INTO `cuisine_type` (`id`, `cuisine`, `picture`) VALUES
(1, 'Italian', NULL),
(2, 'Chinese', NULL),
(3, 'Indian', NULL),
(4, 'Mexican', NULL),
(5, 'Japanese', NULL),
(6, 'French', NULL),
(7, 'Thai', NULL),
(8, 'Middle Eastern', NULL),
(9, 'Greek', NULL),
(10, 'Spanish', NULL),
(11, 'American', NULL),
(12, 'Turkish', NULL),
(13, 'Lebanese', NULL),
(14, 'Korean', NULL),
(15, 'Caribbean', NULL),
(16, 'Brazilian', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dietary_restrictions`
--

CREATE TABLE `dietary_restrictions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietary_restrictions`
--

INSERT INTO `dietary_restrictions` (`id`, `name`, `picture`) VALUES
(1, 'Pork', NULL),
(2, 'Seafood', NULL),
(3, 'Spicy Foods', NULL),
(4, 'Sugar', NULL),
(19, 'Halal Only', NULL),
(20, 'Alcohol', NULL),
(21, 'Lactose', NULL),
(22, 'Gluten', NULL),
(23, 'Low-Sodium', NULL),
(24, 'Nut', NULL),
(25, 'Egg', NULL),
(26, 'Shellfish', NULL),
(27, 'Vegetarian', NULL),
(28, 'Vegan', NULL),
(29, 'Pescatarian (Fish only)', NULL),
(30, 'Red Meat', NULL),
(31, 'Organic Only', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `event_name`, `description`) VALUES
(1, 'Birthday Party', 'Celebration with family and friends.'),
(2, 'Wedding', 'Wedding reception meal planning.'),
(3, 'Eid al-Fitr', 'Celebration meal for Eid.'),
(4, 'BBQ Cookout', 'Outdoor barbecue event.'),
(5, 'Graduation', 'Meal planning for graduation party');

-- --------------------------------------------------------

--
-- Table structure for table `haram_items`
--

CREATE TABLE `haram_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `haram_items`
--

INSERT INTO `haram_items` (`id`, `name`, `description`) VALUES
(1, 'Pork', 'Meat from pigs and all pork-derived products.'),
(2, 'Alcohol', 'Any form of intoxicating drinks or food containing alcohol.'),
(3, 'Carnivorous Animals', 'Animals that hunt and eat other animals, like lions and tigers.'),
(4, 'Birds of Prey', 'Birds with talons such as eagles, hawks, and owls.'),
(5, 'Blood', 'Consumption of blood, whether raw or cooked.'),
(6, 'Dead Meat (Carrion)', 'Meat from animals that died without proper slaughter.'),
(7, 'Animals Not Properly Slaughtered', 'Meat not slaughtered in the name of Allah and according to Islamic rites.'),
(8, 'Animals That Eat Filth', 'Animals that feed on dirt, feces, or similar waste.'),
(9, 'Gelatin (from pork or non-Halal sources)', 'Gelatin derived from pork or non-Halal animals.'),
(10, 'Lard', 'Fat derived from pigs used in cooking or food products.'),
(11, 'Enzymes (from pork)', 'Enzymes derived from non-Halal animals, especially pork.'),
(12, 'Meat from Non-Halal Sources', 'Meat from animals not slaughtered according to Islamic law, including some imported meats.'),
(13, 'Certain Additives (e.g., E120, E441)', 'Food additives derived from non-Halal sources, often found in processed foods.');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_info`
--

CREATE TABLE `ingredient_info` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_allergen` enum('Yes','No') DEFAULT NULL,
  `is_vegetarian` enum('Yes','No') DEFAULT NULL,
  `is_vegan` enum('Yes','No') DEFAULT NULL,
  `halal_status` varchar(255) DEFAULT NULL,
  `unit_of_measurement` varchar(50) DEFAULT NULL,
  `calories_per_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient_info`
--

INSERT INTO `ingredient_info` (`ingredient_id`, `ingredient_name`, `category`, `description`, `is_allergen`, `is_vegetarian`, `is_vegan`, `halal_status`, `unit_of_measurement`, `calories_per_unit`) VALUES
(1, 'Chicken', 'Meat', 'Common poultry used in various dishes.', 'No', 'No', 'No', 'Halal/Non-Halal', 'Grams', 239),
(2, 'Onion', 'Vegetable', 'Bulb vegetable used as a base in many dishes.', 'No', 'Yes', 'Yes', 'Halal', 'Pieces', 40),
(3, 'Garlic', 'Vegetable', 'Aromatic used for seasoning and flavoring.', 'No', 'Yes', 'Yes', 'Halal', 'Cloves', 5),
(4, 'Beef', 'Meat', 'Meat from cattle, used in many cuisines.', 'No', 'No', 'No', 'Halal/Non-Halal', 'Grams', 250),
(5, 'Butter', 'Dairy', 'Solid fat made from cream, used in cooking and baking.', 'No', 'Yes', 'No', 'Halal', 'Grams', 717),
(6, 'Almonds', 'Nut', 'Common nut used in desserts and savory dishes.', 'Yes', 'Yes', 'Yes', 'Halal', 'Grams', 579),
(7, 'Flour (Wheat)', 'Grain', 'Powdered form of wheat used in baking.', 'Yes', 'Yes', 'Yes', 'Halal', 'Grams', 364),
(8, 'Milk', 'Dairy', 'Dairy product commonly used in various recipes.', 'Yes', 'Yes', 'No', 'Halal', 'Liters', 42),
(9, 'Sugar', 'Sweetener', 'Sweet crystalline substance used in desserts and drinks.', 'No', 'Yes', 'Yes', 'Halal', 'Grams', 387),
(10, 'Honey', 'Sweetener', 'Natural sweetener produced by bees, used in many dishes.', 'No', 'Yes', 'No', 'Halal', 'Grams', 304);

-- --------------------------------------------------------

--
-- Table structure for table `junction_meal_type_recipe_info`
--

CREATE TABLE `junction_meal_type_recipe_info` (
  `meal_type_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `junction_recipe_info_recipe_types`
--

CREATE TABLE `junction_recipe_info_recipe_types` (
  `recipeid` int(11) NOT NULL,
  `recipetypeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `junction_recipe_ingredients`
--

CREATE TABLE `junction_recipe_ingredients` (
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `unit_of_measurement` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `junction_user_favorite_recipe`
--

CREATE TABLE `junction_user_favorite_recipe` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recipe_id` int(11) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_type`
--

CREATE TABLE `meal_type` (
  `meal_type_id` int(11) NOT NULL,
  `meal_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_type`
--

INSERT INTO `meal_type` (`meal_type_id`, `meal_name`, `description`) VALUES
(1, 'Breakfast', 'Common morning meals like eggs, pancakes, cereal, etc.'),
(2, 'Brunch', 'A combination of breakfast and lunch items, often on weekends.'),
(3, 'Lunch', 'Midday meals such as sandwiches, salads, and light dishes.'),
(4, 'Dinner', 'Evening meals, often more substantial like casseroles or steaks.'),
(5, 'Snacks', 'Small bites like chips, nuts, or fruits, usually between meals.'),
(6, 'Dessert', 'Sweet treats such as cakes, ice cream, or pies after meals.'),
(7, 'Supper', 'Light meals such as soup or sandwiches consumed later at night.'),
(8, 'Appetizer', 'Starters like soups, salads, or dips served before the main meal.'),
(9, 'Beverage', 'Drinks such as coffee, tea, juice, smoothies, or cocktails.'),
(10, 'Side Dish', 'Dishes served alongside the main course, like mashed potatoes or bread.');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `notification_type` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_sent` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nutritional_info`
--

CREATE TABLE `nutritional_info` (
  `nutrition_id` int(11) NOT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `ingredient_id` int(11) DEFAULT NULL,
  `calories` decimal(10,2) DEFAULT NULL,
  `protein_g` decimal(10,2) DEFAULT NULL,
  `fat_g` decimal(10,2) DEFAULT NULL,
  `carbs_g` decimal(10,2) DEFAULT NULL,
  `serving_size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_category`
--

CREATE TABLE `recipe_category` (
  `name` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_category`
--

INSERT INTO `recipe_category` (`name`, `id`, `image`) VALUES
('Appetizers', 1, ''),
('Main Courses', 3, ''),
('Desserts', 4, ''),
('Snacks', 5, ''),
('Beverages', 6, ''),
('Soups', 7, ''),
('Salads', 8, ''),
('Side Dishes', 9, ''),
('Breakfast', 10, ''),
('Baked Goods', 11, ''),
('Vegan', 12, ''),
('Vegetarian', 13, ''),
('Gluten-Free', 14, ''),
('Low-Carb', 15, ''),
('Keto', 16, ''),
('Holiday Recipes', 17, ''),
('Quick & Easy Meals', 18, ''),
('Kid-Friendly Recipes', 19, '');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_feedback`
--

CREATE TABLE `recipe_feedback` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 1,
  `recipe_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_feedback`
--

INSERT INTO `recipe_feedback` (`review_id`, `user_id`, `recipe_id`, `rating`, `review_text`, `review_date`) VALUES
(1, 1001, 101, 5, 'Delicious and easy to make!', '2024-03-10'),
(2, 1002, 2002, 4, 'Great course, learned a lot.', '2024-03-15'),
(3, 1003, 3003, 5, 'Excellent chef, very professional.', '2024-03-20'),
(4, 1004, 102, 3, 'Good but could use more seasoning.', '2024-03-22'),
(5, 1005, 2004, 5, 'Excellent vegetarian recipes!', '2024-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_info`
--

CREATE TABLE `recipe_info` (
  `id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `total_time` time NOT NULL,
  `dishes_you_need` varchar(50) NOT NULL,
  `story` varchar(100) NOT NULL,
  `how_you_learn` varchar(100) NOT NULL,
  `ingredients` varchar(250) NOT NULL,
  `when_to_cook` varchar(50) NOT NULL,
  `used_as` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `nutrition_info` varchar(250) NOT NULL,
  `location_where_it_famous` varchar(50) NOT NULL,
  `for_how_many_person` int(11) NOT NULL,
  `review` varchar(100) NOT NULL,
  `recipe_type` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `skill_level` int(11) NOT NULL,
  `image` blob NOT NULL,
  `author` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_type`
--

CREATE TABLE `recipe_type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_type`
--

INSERT INTO `recipe_type` (`id`, `name`, `image`) VALUES
(1, 'Vegetarian', ''),
(2, 'Vegan', ''),
(3, 'Gluten-Free', ''),
(4, 'Low-Carb', ''),
(5, 'Dairy-Free', ''),
(6, 'Paleo', ''),
(7, 'Keto', ''),
(8, 'Sugar-Free', ''),
(9, 'High-Protein', ''),
(10, 'Low-Fat', ''),
(11, 'Spicy', ''),
(12, 'Comfort Food', ''),
(13, 'Grilled', ''),
(14, 'Baked', ''),
(15, 'Stir-Fried', ''),
(16, 'Raw', ''),
(17, 'Slow-Cooked', ''),
(18, 'One-Pot Meals', ''),
(19, 'Quick & Easy', '');

-- --------------------------------------------------------

--
-- Table structure for table `spices`
--

CREATE TABLE `spices` (
  `spice_id` int(11) NOT NULL,
  `spice_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity_in_stock` int(11) DEFAULT NULL,
  `unit_of_measurement` varchar(50) DEFAULT NULL,
  `price_per_unit` decimal(10,2) DEFAULT NULL,
  `allergy_warning` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spices`
--

INSERT INTO `spices` (`spice_id`, `spice_name`, `description`, `quantity_in_stock`, `unit_of_measurement`, `price_per_unit`, `allergy_warning`) VALUES
(1, 'Turmeric', 'Ground turmeric, used for color and flavor.', 500, 'grams', '10.00', 'None'),
(2, 'Cumin', 'Ground cumin, earthy flavor.', 300, 'grams', '8.00', 'None'),
(3, 'Cinnamon', 'Ground cinnamon, sweet and aromatic.', 200, 'grams', '12.00', 'None'),
(4, 'Black Pepper', 'Whole black peppercorns.', 250, 'grams', '15.00', 'None'),
(5, 'Cardamom', 'Green cardamom pods, aromatic spice.', 150, 'grams', '20.00', 'None'),
(6, 'Paprika', 'Ground paprika, adds color and mild heat.', 350, 'grams', '9.00', 'None'),
(7, 'Cloves', 'Whole cloves, strong and aromatic.', 100, 'grams', '18.00', 'None'),
(8, 'Coriander', 'Ground coriander, citrusy flavor.', 250, 'grams', '11.00', 'None'),
(9, 'Chili Powder', 'Ground chili peppers, spicy flavor.', 400, 'grams', '14.00', 'None'),
(10, 'Ginger', 'Ground ginger, spicy and sweet.', 300, 'grams', '13.00', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cooking_skill_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, `pass`, `location`, `profile_picture`, `created_at`, `updated_at`, `cooking_skill_level`) VALUES
(1, 'Unknown', NULL, '', '', NULL, NULL, '2024-09-12 13:10:27', '2024-09-12 13:10:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_preference`
--

CREATE TABLE `user_preference` (
  `preference_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `preference_type` varchar(255) DEFAULT NULL,
  `preference_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergic_food`
--
ALTER TABLE `allergic_food`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `chef_applications`
--
ALTER TABLE `chef_applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `cuisine_type`
--
ALTER TABLE `cuisine_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cuisine` (`cuisine`);

--
-- Indexes for table `dietary_restrictions`
--
ALTER TABLE `dietary_restrictions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `haram_items`
--
ALTER TABLE `haram_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_info`
--
ALTER TABLE `ingredient_info`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `junction_meal_type_recipe_info`
--
ALTER TABLE `junction_meal_type_recipe_info`
  ADD PRIMARY KEY (`meal_type_id`,`recipe_id`),
  ADD KEY `fk_recipe_info` (`recipe_id`);

--
-- Indexes for table `junction_recipe_info_recipe_types`
--
ALTER TABLE `junction_recipe_info_recipe_types`
  ADD PRIMARY KEY (`recipeid`,`recipetypeid`),
  ADD KEY `fk_recipe_type_id` (`recipetypeid`);

--
-- Indexes for table `junction_recipe_ingredients`
--
ALTER TABLE `junction_recipe_ingredients`
  ADD PRIMARY KEY (`recipe_id`,`ingredient_id`),
  ADD KEY `fk_ingredient` (`ingredient_id`);

--
-- Indexes for table `junction_user_favorite_recipe`
--
ALTER TABLE `junction_user_favorite_recipe`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `meal_type`
--
ALTER TABLE `meal_type`
  ADD PRIMARY KEY (`meal_type_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `nutritional_info`
--
ALTER TABLE `nutritional_info`
  ADD PRIMARY KEY (`nutrition_id`);

--
-- Indexes for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `recipe_feedback`
--
ALTER TABLE `recipe_feedback`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `recipe_info`
--
ALTER TABLE `recipe_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_author` (`author`);

--
-- Indexes for table `recipe_type`
--
ALTER TABLE `recipe_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `spices`
--
ALTER TABLE `spices`
  ADD PRIMARY KEY (`spice_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_preference`
--
ALTER TABLE `user_preference`
  ADD PRIMARY KEY (`preference_id`),
  ADD KEY `fk_preferences_user_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergic_food`
--
ALTER TABLE `allergic_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cuisine_type`
--
ALTER TABLE `cuisine_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dietary_restrictions`
--
ALTER TABLE `dietary_restrictions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `haram_items`
--
ALTER TABLE `haram_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `junction_user_favorite_recipe`
--
ALTER TABLE `junction_user_favorite_recipe`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nutritional_info`
--
ALTER TABLE `nutritional_info`
  MODIFY `nutrition_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_category`
--
ALTER TABLE `recipe_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `recipe_info`
--
ALTER TABLE `recipe_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_type`
--
ALTER TABLE `recipe_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_preference`
--
ALTER TABLE `user_preference`
  MODIFY `preference_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `junction_meal_type_recipe_info`
--
ALTER TABLE `junction_meal_type_recipe_info`
  ADD CONSTRAINT `fk_meal_type` FOREIGN KEY (`meal_type_id`) REFERENCES `meal_type` (`meal_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_recipe_info` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `junction_recipe_info_recipe_types`
--
ALTER TABLE `junction_recipe_info_recipe_types`
  ADD CONSTRAINT `fk_recipe_id` FOREIGN KEY (`recipeid`) REFERENCES `recipe_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_recipe_type_id` FOREIGN KEY (`recipetypeid`) REFERENCES `recipe_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `junction_recipe_ingredients`
--
ALTER TABLE `junction_recipe_ingredients`
  ADD CONSTRAINT `fk_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient_info` (`ingredient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `junction_user_favorite_recipe`
--
ALTER TABLE `junction_user_favorite_recipe`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_info`
--
ALTER TABLE `recipe_info`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`author`) REFERENCES `user_info` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_preference`
--
ALTER TABLE `user_preference`
  ADD CONSTRAINT `fk_preferences_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

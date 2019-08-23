--DB SCRIPT FOR LAPTOP'S PARADISE (PROVIDER 1)
CREATE DATABASE laptops_paradise;

CREATE TABLE `items` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `categorie` varchar(50) NOT NULL
)

INSERT INTO `items` (`id`, `item_name`, `price`, `description`, `image`, `categorie`) VALUES
(1, 'MackBook Pro 2019', 2399, 'A high quality laptop!', 'laptop.jpg', 'Laptop'),
(2, 'Dell G3 Gaming', 1600, 'A high quality laptop!', 'laptop.jpg', 'Laptop'),
(3, 'Asus VivoBook', 900, 'A high quality laptop!', 'laptop.jpg', 'Laptop'),
(4, 'Huawei Mate Book X', 1650, 'A high quality laptop!', 'laptop.jpg', 'Laptop'),
(5, 'Lenovo IdeaPad', 850, 'A high quality laptop!', 'laptop.jpg', 'Laptop'),
(6, 'HP', 900, 'HP Laptop', 'laptop.jpg', 'Laptop'),
(7, 'HP Satellite', 800, 'Best hp laptop', 'laptop.jpg', 'Laptop'),
(8, 'Accer Nitro', 1000, 'Accer', 'laptop.jpg', 'laptop'),
(11, 'Asus Zenbook', 1400, 'New laptop with a brand new processor', 'zenbook.jpg', 'Laptop'),
(10, 'HP Satellite 3', 1000, 'Satellite 2019', 'laptop.jpg', 'Laptop');

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
)

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');






-- PROCEDURES --

--DELETE ITEM 
DELIMITER $$
CREATE PROCEDURE `sp_delete_item` (IN `id_p` INT)  BEGIN
	DELETE FROM items WHERE id = id_p;
END $$

--GET ALL THE ITEMS FROM THE DB
DELIMITER $$
CREATE PROCEDURE `sp_get_all_items` ()
SELECT  *
FROM items
END $$

--GET AN ITEM DATA TO UPDATE IT
DELIMITIR $$
CREATE PROCEDURE `sp_get_selected_item` (IN `id_p` INT)  BEGIN
	SELECT item_name,price,description,image,categorie FROM items WHERE id = `id_p`;
END $$

--INSERT A NEW ITEM
DELIMITER $$ 
CREATE PROCEDURE `sp_insert_item` (IN `item_name` VARCHAR(50), IN `price` INT, IN `description` VARCHAR(250), IN `image` VARCHAR(100), IN `category` VARCHAR(50))  BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
    
    START TRANSACTION;
	IF EXISTS(SELECT items.item_name FROM items WHERE items.item_name = item_name) THEN
		SELECT '0' as result;
    	ROLLBACK;         
        
   	ELSE
   		INSERT INTO items(item_name,price,description,image,categorie)
   		VALUES(item_name,price,description,image,category);
   		COMMIT;
    END IF;
END $$

-- ALLOW A ADMIN TO LOG IN
CREATE PROCEDURE `sp_signIn` (IN `username` VARCHAR(50), IN `password` VARCHAR(50))  BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
    
    START TRANSACTION;
	IF EXISTS(SELECT * FROM users a WHERE a.password = password AND a.username = username) THEN
    	SELECT a.username, a.password
    	FROM users a
    	WHERE a.password = password AND a.username = username;           
        COMMIT;
   	ELSE
    	SELECT '0' as result;
        ROLLBACK;
    END IF;
END $$

-- UPDATE THE DATA OF A SELECTED ITEM
CREATE PROCEDURE `sp_update_item` (IN `id_p` INT, IN `item_name_p` VARCHAR(50), IN `price_p` INT, IN `description_p` VARCHAR(250))  BEGIN
	UPDATE items 
    SET item_name = item_name_p,
    price = price_p,
    description = description_p
    WHERE items.id = id_p;
END $$

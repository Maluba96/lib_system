# Course Project 4035
## Developers: 
- Maluba Mulebi
- Wila Mwila
- Richard K. Nsama
## To Install Project
Have XAMPP installed and configured properly
Create a DB in PHPMyadmin called 'lib_system'
Follow the steps below.
- Create tables with the following schemas
- Users table
```
CREATE TABLE `lib_system`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(100) NOT NULL , `last_name` VARCHAR(100) NOT NULL , `email` VARCHAR(150) NOT NULL , `password` VARCHAR(300) NOT NULL , `joined` DATE NOT NULL , `last_login` DATE NOT NULL , PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;
```
- Book Names
```
CREATE TABLE `lib_system`.`book_names` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(150) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```
- Writers
```
CREATE TABLE `lib_system`.`writers` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(100) NOT NULL , `last_name` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```
- Books
```
CREATE TABLE `lib_system`. ( `ISBN` VARCHAR(20) NOT NULL , `name_id` INT NOT NULL , `writers` INT NOT NULL , `available` BOOLEAN NOT NULL , `categories` INT NOT NULL , `image` VARCHAR(200) NOT NULL , `book_condition` VARCHAR(6) NOT NULL , `details` TEXT NOT NULL , PRIMARY KEY (`ISBN`), INDEX (`writers`), INDEX (`name_id`), INDEX (`categories`)) ENGINE = InnoDB;
```
- Book Name to Book Names Table Relation
```
ALTER TABLE `books` ADD FOREIGN KEY (`name_id`) REFERENCES `book_names`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
```
- Junction Table for Many to Many Relationship for Book Writers
```
CREATE TABLE `lib_system`.`junct_writers` ( `book_id` INT NOT NULL , `writer_id` INT NOT NULL , INDEX (`book_id`), INDEX (`writer_id`)) ENGINE = InnoDB;
```
- Change Book ID Data Type to VARCHAR in Juction Table Above
```
ALTER TABLE `junct_writers` CHANGE `book_id` `book_id` VARCHAR(20) NOT NULL;
```
- Many to Many Relationship for Writers and Books
```
ALTER TABLE `junct_writers` ADD FOREIGN KEY (`book_id`) REFERENCES `books`(`ISBN`) ON DELETE RESTRICT ON UPDATE CASCADE; ALTER TABLE `junct_writers` ADD FOREIGN KEY (`writer_id`) REFERENCES `writers`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
```
- Categories Table
Create a categories table with ID as primary key and name as a varchar
- Juction Table for Categories and Books
```
CREATE TABLE `lib_system`.`junct_categories_books` ( `book_id` VARCHAR(20) NOT NULL , `category_id` INT NOT NULL , INDEX (`book_id`), INDEX (`category_id`)) ENGINE = InnoDB;
```
- Many to Many Relationship between books and categories
```
ALTER TABLE `junct_categories_books` ADD FOREIGN KEY (`book_id`) REFERENCES `books`(`ISBN`) ON DELETE RESTRICT ON UPDATE CASCADE; ALTER TABLE `junct_categories_books` ADD FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
```
- members_list
```
CREATE TABLE `members_list` (
  `id` int(20) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `nrc_number` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
- Issued Books
```
CREATE TABLE `issued_books` (
  `id` int(20) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_holder` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
- Book ID Foreign Key
```
ALTER TABLE `issued_books` ADD FOREIGN KEY (`book_id`) REFERENCES `books`(`ISBN`) ON DELETE RESTRICT ON UPDATE CASCADE;
```
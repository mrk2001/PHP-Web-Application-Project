Introduction:
The project will be to develop a PHP web application for Cold Drink Cafe. It will demonstrate the practical implementation of some PHP ideas taught in class. Therefore, the main purpose of doing this is to develop a well-rounded system that will enable users to manage cold drinks using the database. This will ensure persistence of data between sessions. The web application provides a window with functionalities for adding, deleting, modifying, and sorting drinks, which are categorized as regular, zero sugar, and diet. Here is the brief structure: database with two tables—Categories and Products—plus PHP scripts, add_drink.php, delete_drink.php, modify_drink.php, and sort_drinks.php, containing the core operations of the application. The design and styling of the project are heavily inspired by the Product Manager application in Chapter 4 of Murach's PHP and MySQL (3rd ed.) (Murach, Boehm, & Harris, 2014), which is clean and keeps a common user experience.

Acknowledgement:
Murach’s PHP and MYSQL 3rd edition , Chapter 4: How to use PHP with MySQL (My Guitar Shop Product Manager )
Implementation Details:
Database Setup:
The database used for the Cold Drink Cafe application is MySQL with two tables: Categories and Products. The first one is the Categories table, which contains categoryID (primary key) and categoryName. Three categories have been defined in this table: regular, zero sugar, and diet. The second table is the Products table, which contains productID (primary key), categoryID (foreign key), productCode, productName, and listPrice. There exists a relationship between the two tables; this kind of relational structure properly categorizes drinks, which makes effective management and retrieval of data easy and possible.
 ![image](https://github.com/user-attachments/assets/4f3a450f-9956-496f-b1f8-fd44e68261ef)

Figure 1Database cold_drink_cafe (product)

User Interface:
The User Interface design is accessible and functional with a clean layout styled using styles.css. This includes a header, footer, and main content area which consists of a drink list, forms to add, delete and modify drinks. The navigations and layout have been purely coded in HTML and CSS with a proper hierarchy that allows the interface elements to be clearly identified.
 ![image](https://github.com/user-attachments/assets/9e095937-e8ae-43a0-a5c6-6b44e4d73321)

Figure 2 User Interface (index.php)



Core Functionalities:
Add Drink:
The add_drink.php script is used to add new drinks to the Products table. It includes a form for the product name, category, product code, and price. Once submitted, this script validates the entries and then inserts the new drink into the database. Error handling will be done to facilitate incomplete or incorrect entries in tune with the standards of validation for the application.
 ![image](https://github.com/user-attachments/assets/d7c51adf-3e9c-42a9-922d-bde89cc58503)

Figure 3 Add Drink (add_drink.php)


Delete Drink:
The file delete_drink.php really has implemented the functionality to delete drinks from the inventory. Here, one can select a drink from the list shown and click the 'Delete' button. The corresponding entry from the Products table is deleted, according to the productID. There are some confirmations in the process in order to avoid an accidental deletion, but the main goal is the integrity of data.
 ![image](https://github.com/user-attachments/assets/8580328f-26d8-4e98-8bb3-b844277ae63f)

Figure 4Delete Drink (before deleting)

 ![image](https://github.com/user-attachments/assets/7bf47d50-9040-470b-b000-12f8e7abc0e4)

Figure 5 Delete Drink ( After Deleting)

Modify Drink:
Existing drinks can be updated using the script modify_drink.php. This feature enables the product name and price of the drink to be updated in the database. When the script is executed, it will fetch the current details of the selected drink and produce an editable form. The changes are then saved back to the database, where validation checks are performed to guarantee data continuity.
 ![image](https://github.com/user-attachments/assets/25dd9950-e61a-437e-9af1-dd1d614901b5)

Figure 6 Modify Drink (modify_drink.php)

Sort Drinks:
The sorting functionality of the sort_drinks.php script allows the user to obtain drinks in an ascending or descending order by name. This feature will bring a lot of value to the user's experience, as they are able to easily get to specific drinks from larger lists. It uses SQL queries with ORDER BY clauses and dynamically changes the display upon user selection.

Ascending:
 ![image](https://github.com/user-attachments/assets/962ae38e-08d5-49ea-a03f-474699d77c3f)

Figure 7 Sort Drinks (sort_drinks.php) Asecending

Descending:
 ![image](https://github.com/user-attachments/assets/793aa376-9a84-48aa-9f6b-c5ba1ddb5490)

Figure 8 Sort Drinks (sort_drinks) Descending

Styling and Layouts:
The styles.css file gives all the specifications of layout, typography, and general design of the interface within an application. Key inclusions are:

Global Styles: This is where we set up a consistent look and feel across our application with things like background color, margins, and font choices.
Header and Footer: The styling of the header and footer of the application includes proper borders and padding, which would make the content zones look different from one another.
Forms and Tables: Positioning the input field elements and presenting the tables in a readable and user-friendly manner for interaction—also incorporating styles on the input fields, labels, and buttons.
 ![image](https://github.com/user-attachments/assets/8c4d74fe-8132-445c-b9db-84051ad37e7f)

Figure 9 Styles.css


Testing and Validation of each Functionalities:

Add Drink:
We will add drink named Rockstar (REG005) on Regular Category, And check if it updates the cold_drink_cafe database as well. Below pictures are screenshots of entire process:

 ![image](https://github.com/user-attachments/assets/d2b51707-dbff-47c2-8d7c-58c3cda76b17)
Before Input:

Input:
![image](https://github.com/user-attachments/assets/66733986-363a-41ba-879c-9e40ab44ce86)

 
![image](https://github.com/user-attachments/assets/d74c9851-5ee7-4c0d-8087-1edda48ce583)

Output:
 ![image](https://github.com/user-attachments/assets/52b880d4-b762-452f-860c-3216b058b801)


 
New drink have been added to products table successfully.

Delete Drink:
We will delete Previously added drink named Rockstar (REG005)
 ![image](https://github.com/user-attachments/assets/79060601-3aef-40d6-b32c-4ccd44a8556f)
![image](https://github.com/user-attachments/assets/1c2a58b9-3aac-4276-945d-f48d82a64efa)

 

Modify Drink:
We will modify drink named Mountain Dew to Mountain Dew NEW and the price will be increased to 8
 ![image](https://github.com/user-attachments/assets/879a7202-7525-4baa-be1f-3074e2eb7312)
![image](https://github.com/user-attachments/assets/c025e78a-d03a-4db4-a185-d25e52505c69)


 
Sort Drinks:
This functionality designed to sort drinks based on Alphabetical order first then by price (as per assignment requirements). 
![image](https://github.com/user-attachments/assets/dc005369-42a7-419c-a2a7-52e06065ee6d)

Sorting Drinks by Ascending Order:
 

Sorting Drinks By Descending Order:
![image](https://github.com/user-attachments/assets/8ab76fef-2ba5-4ea6-b917-5f1e5f126ade)

 
 


# **Rent Books**
<img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"/> <img alt="HTML5" src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/> <img alt="HTML5" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/> <img alt="HTML5" src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white"/><br>
The purpose of this website is to rent books for 7 days through the admin panel.<br>
There are not many functions for the user panel because this website actually only focuses on the functions and UI of the admin panel. The UI of this project is almost all responsive under 800px screen layar<br>
Demo : https://bookrents.000webhostapp.com

# Requirements
- XAMPP : PHP >= 7.4.11
- Bootstrap >= 5.0.0
# Installation
Download repositories. put the folder to your server
# Usage
- Create database, or download my database structure. (sewa_buku.sql)
- Open localhost/sewa_buku/login.php
- Input the login data:
  - Admin :
    - Username : admin
    - Password : admin123
  - User :
    - Username : KHVTS
    - Password : KHVTS
# Other Information
Project status: Finished<br>
# Features
### **Admin Panel Features:**
- Adding data to the database via the sidebar which has a collapse function

  - Starting from adding a user account.<br>
  <img src="https://user-images.githubusercontent.com/73767596/126889355-52b4e1c4-fb3a-4d84-8ffb-50e98ed10800.png" width="80%"><br>
    - This username textbox will later become the password as well. so after the user is registered by the admin, the user is advised to change the password.
    - The full name textbox is filled as usual with a maximum of 100 characters
    - Gender selection here uses the select2 feature which can search for data on a large scale as well as select the data.
    - Date selection, Job, Address filled as usual.
    - File selection and other inputs are mandatory, otherwise the account cannot be created<br><br>

  - Added Genre, Publisher, and Author data `<similar input method>`<br>
  <img src="https://user-images.githubusercontent.com/73767596/126889411-c08f3008-6d4b-41a2-9427-136130114190.png" width="80%"><br>
    - The three data will be called later when selecting data using select2, the unique ID created by the admin will appear later<br><br>

  - Adding book data<br>
  <img src="https://user-images.githubusercontent.com/73767596/126889498-013ef751-ccd6-4272-a67e-cf7a6a191d27.png" width="80%"><br>
    - Textbox ID has 8 characters input limit
    - Selection year input using javascript
    - Selection Genre, Publisher, and Author use select2 where the value is the ID of each data, but for the display, what appears is the name of the data<br><br>

- View data that has been added to browse_data.php
  - By using datatable, admins can easily sort and search for the desired data
  - Using tab pane to switch between kinds of data

### **User Panel Features**:
- See what books the user rents using datatables<br>
<img src="https://user-images.githubusercontent.com/73767596/126889192-318702a6-fa85-4d3f-abae-74829109e7c5.png" width="65%"><br><br>
- View all the books that are on the admin.<br>
<img src="https://user-images.githubusercontent.com/73767596/126889244-0ea71c50-0a91-4758-8aa6-a82f59cd2b83.png" width="65%"><br><br>
- Updating user data, can change data without changing photos by clicking the user icon on top right.<br>
<img src="https://user-images.githubusercontent.com/73767596/126889091-ee0b37f0-e5a9-444b-afe5-be47b9fed84c.png" width="65%">
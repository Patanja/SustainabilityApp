# SustainabilityApp
Final project HND Edinburgh College. Sustainability Accountability and certificate service of sustainable actions.
Readme: 
Sustainability App
Description
The Sustainability App is designed to help individuals and organizations track and improve their environmental impact. It provides tools for calculating carbon footprint, managing sustainability certifications, and learning about environmentally friendly practices. The app aims to promote a more sustainable lifestyle through user engagement and data-driven insights.

Features
Sustainable Actions Form/Calculator (Green Calculator)
The Green Calculator allows users to evaluate the sustainability of their actions by calculating scores based on factors like emissions reduction, recycling, and other environmentally friendly practices. Scores are calculated out of a maximum of 100 points. Achieving a full score results in receiving an award, symbolising exemplary sustainable behaviour.

Offset of Points into Donations
For each point below the maximum of 100, a monetary donation is made to support various environmental initiatives. Currently, each missing point translates into a donation of £1, directly contributing to sustainability projects.


User and CRUD Operations
Users can create, read, update, and delete (CRUD) their profiles. This includes managing login credentials, personal information, and viewing their sustainability score history.

Payment Gateways and Card Details
Secure payment gateways are integrated to handle donations and other transactions. The system ensures the safe processing of card details, adhering to the latest security standards.

Administrator Functions
Administrative accounts have extended privileges, including the ability to manage user accounts, block access when necessary, and modify system settings to maintain the integrity and smooth operation of the platform.

Certification Tracking
Organisations can manage and track their sustainability certifications through the app. This feature helps organisations monitor their compliance with environmental standards and progress towards certification goals.

Resource Library (To Implement)
A comprehensive resource library is planned, which will offer access to a wide range of materials on sustainable practices. This will include guides, articles, and tips to help users and organisations adopt more environmentally friendly routines.

Interactive Dashboard (To Implement)
An interactive dashboard is under development, which will visualise sustainability metrics through dynamic charts and graphs. This feature will allow users to monitor their environmental impact and improvement over time, fostering a deeper engagement with sustainable practices.


Installation
Prerequisites
PHP 7.4 or higher
MySQL 5.7 or higher
Composer (for managing PHP dependencies)


Steps
Clone the repository:
Copy code
git clone https://github.com/Patanja/SustainabilityApp.git
cd sustainability-app
Install dependencies:
Copy code
composer install


Set up the database:
Import the susapp.sql file into your MySQL database.

Run the application:
To serve the application, it is recommended to use a web server such as Apache or Nginx. For ease of setup and best compatibility, especially on Windows environments, using XAMPP is highly recommended. XAMPP includes Apache, MySQL, PHP, and Perl, providing a complete environment to support all necessary components of the application. https://www.apachefriends.org/

Ensure that the public directory of your application is set as the web root. In XAMPP, this corresponds to the htdocs directory. This setup is crucial for the proper functioning of your application, as it defines the entry point for the web server to serve your app files. 

Access the application:

Open a web browser and navigate to http://localhost or your configured domain.

Contributing
All contributions are welcome from the community. If you wish to contribute to the Sustainability App, please fork the repository and submit a pull request.

Issues: Use GitHub issues to report bugs.
Pull Requests: Submit PRs for bug fixes or feature enhancements.
License
This project is created as a part of the HND certification final project for the Edinburgh College.

Contact
For support or to contact the developers, please email sanelcontreras@gmail.com


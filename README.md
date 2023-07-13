# Safari Stay

A Web Application for Searching Tourist Facilities in Kenya

## Table of Contents

- [1. Introduction](#1-introduction)
- [2. Installation](#2-installation)
- [3. Features](#3-features)
- [4. Usage](#4-usage)
- [5. Contributing](#5-contributing)
- [6. License](#6-license)
- [7. Contact](#7-contact)
- [8. Acknowledgement](#8-acknowledgement)


## 1. Introduction

This web application is a comprehensive platform that aims to enhance the accessibility and convenience of tourism in Kenya. The website provides a centralized resource for tourists and potential visitors to access reliable and up-to-date information about different tourist destinations, activities, accommodations, and transport options in Kenya. It addresses the challenges faced by tourists in finding comprehensive information and promotes transparency and convenience in booking accommodations and tour packages.

### Background Information

The tourism sector in Kenya plays a vital role in the country's economy. Despite the impact of the Covid-19 pandemic, the tourism sector has shown significant recovery, with increased international tourist arrivals and growth in inbound receipts. To rejuvenate the tourism industry, the Ministry of Tourism, Wildlife and Heritage has outlined strategies to enhance performance, develop niche products, and promote affordable and accessible travel. The private sector also plays a crucial role in promoting tourism by providing visibility and accessibility to tourist facilities.

### Problem Statement

The lack of a centralized platform with comprehensive and trustworthy information about tourist facilities in Kenya hinders tourists from accessing reliable details and creates challenges for tourism businesses to reach potential customers. There is a need for a website that serves as a one-stop-shop for Kenyan tourism needs, providing reliable information and facilitating bookings.

### Objectives

- Analyze existing applications and identify the problems faced by current systems
- Design a web platform specifically for searching tourist sites and facilities in Kenya
- Track user's booking information and generate reports
- Test and validate the application

## 2. Installation

### 2.1 Prerequisites
Before getting started, ensure that you have the following software installed on your machine:
- XAMPP (for Apache, PHP, and MySQL)
- Git
- Composer
- Stripe for payment integration

### 2.2 Setting up the Environment
1. Install XAMPP by following the instructions on the official XAMPP website: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)
2. Start the Apache and MySQL services in XAMPP control panel.

### 2.3 Clone the Repository
1. Open your terminal or command prompt.
2. Navigate to the directory where you want to clone the repository.
3. Run the following command to clone the repository:
   ```terminal
   git clone [https://github.com/HumphreyDulo/https---github.com-HumphreyDulo-Kihanya-Mungai-CS1.git]
   ```

### 2.4 Database Setup
1. Access the MySQL database through phpMyAdmin:
   - Open your web browser and go to `http://localhost/phpmyadmin`
   - Click on the "New" button to create a new database.
   - Give the database a name (e.g., `home`) and click "Create".
2. Open your terminal or command prompt.
3. Navigate to the project directory.
4. Run the following command to run the migrations and create the necessary tables:
   ```terminal
   php spark migrate
   4. Run the following command to run the migrations and create the necessary tables:
   ```terminal
   php spark migrate
   


### 2.5 Configuring CodeIgniter
1. Open the project folder in a text editor.
2. Locate the `app/Config/Database.php` file.
3. Update the database configuration settings with your MySQL database credentials:
   ```php
   public $default = [
       'DSN'      => '',
       'hostname' => 'localhost',
       'username' => 'your_username',
       'password' => 'your_password',
       'database' => 'home',
       ...
   ];
   ```
   Replace `'your_username'` and `'your_password'` with your MySQL database credentials.

### 2.6 Running the Project
1. Start the Apache and MySQL services in XAMPP control panel, if they are not running.
2. Open your terminal or command prompt.
3. Navigate to the project directory.
4. Run the following command to start the CodeIgniter development server:

   php spark serve

By default, the server will run on 'http://localhost:8080'. If you want to run it on a different port, use the --port option followed by the desired port number (e.g., php spark serve --port=8000).
5. Open your web browser and go to http://localhost:8080 (or the specified port)

Please note that in the installation section, you need to replace `[repository_url]`, `'your_username'`, `'your_password'`, and `[path_to_repository]` with the actual values specific to your project and environment.

### 2.6 Installing stripe
Apologies for the confusion. The previous instructions were not in markdown format. Here are the steps to install Stripe in your project, including the necessary modifications to `php.ini`, in markdown language:

1. Create a Stripe Account: If you haven't already, sign up for a Stripe account at [stripe.com](https://stripe.com). Once you're signed up, you'll have access to your API keys, which you'll need to integrate Stripe into your project.

2. Download Composer: Composer is a dependency management tool for PHP. If you don't have Composer installed, download and install it by following the instructions at [getcomposer.org](https://getcomposer.org/download/).

3. Create a New Project: Assuming you already have a PHP project set up, open a terminal or command prompt and navigate to your project's directory.

4. Require Stripe Library: In your project's root directory, run the following command to require the Stripe PHP library:

   ```bash
   composer require stripe/stripe-php
   ```

   This command downloads the Stripe PHP library and adds it as a dependency to your project.

5. Configure PHP.ini: Open your `php.ini` file and ensure the following extensions are enabled:

   ```ini
   extension=curl
   extension=gd2
   ```

   Save the changes and restart your web server to apply the configuration.

6. Include Stripe Library: In your PHP file where you want to use Stripe, include the Stripe PHP library by adding the following line at the top:

   ```php
   require_once 'vendor/autoload.php';
   ```

7. Set Your Stripe API Keys: In the same PHP file, replace `'your_publishable_key'` and `'your_secret_key'` with your actual Stripe API keys:

   ```php
   \Stripe\Stripe::setApiKey('your_secret_key');
   ```

   You can find your API keys in your Stripe account dashboard.

8. Start Using Stripe: With the Stripe PHP library installed and API keys configured, you can now start using Stripe's features in your PHP code. For example, to create a payment charge, you can use the following code:

   ```php
   $charge = \Stripe\Charge::create([
       'amount' => 2000, 
       'currency' => 'usd',
       'source' => 'tok_visa', // Replace with actual card token. tok_visa is a token for visa cards
       'description' => 'Example charge',
   ]);
   ```

   Customize the code according to your specific payment scenarios and requirements.

After that, you will have successfully installed Stripe in your PHP project. Remember to consult the official Stripe documentation for more detailed information and examples on how to use Stripe's features effectively.


## 3. Features

- Comprehensive and up-to-date information about tourist destinations in Kenya
- Search functionality to easily find tourist sites, accommodations, and tour packages
- Booking system with tracking and reporting capabilities
- Payment options including local mobile money methods
- Profiles for property owners and advertisers(vendors) to showcase their offerings
- Communication features for customers to contact property owners and advertisers

## 4. Usage

Below is the overview of how the application is used for two categories of users

### Customers

In the context of this web application, a customer is any user who wishes to search for tourist facilities in Kenya.
To do this, they can follow the simple steps below:
1. When a cutomer loads our application, they are welcomed by our landing page, which will prompt the to 'Explore' the application 
2. Afterwards you can Register as a customer and log in.
3. Once logged in, they will have the ability to access the web application fully as a user
4. They will be able to view all the places offered in the application
5. Using the filters tab on the extreme left hand side, a customer can put in specifications on the place they would like to visit, such as        preferred location, number of bedrooms, bathrooms and even the price
6. Once the desired place is found, the customer can then proceed to booking by selecting their check-in and check-out dates
7. Confirmation of booking is done by selecting the 'Book Now' button on the right panel.

....

### Vendors

In the context of this web application, a vendor is anyone (such as an agent, hotel owner or tour company) who wishes to advertise their facilities using our application.
If you wish to advertise and avail your facility using our application, follow these steps:
1. Register(if not already) and log in as a vendor.
2. Once logged in, as a vendor you will have a dashboard that will show all the facilities you have posted and you will have the option to ad another(Add Product)
3. After clicking the 'Add Product' button, you will be redirected to a page where you can specify the product you would like to add
   ....

## 5. Contributing

We welcome contributions to the Kenya Tourism Website project. Whether you want to report a bug, suggest a new feature, or contribute code improvements, we appreciate your input. Follow the guidelines below to get started.

### Getting Started

To contribute to the project, follow these steps:

1. **Fork** the repository by clicking on the "Fork" button at the top right corner of the repository page. This will create a copy of the repository under your GitHub account.
2. **Clone** the forked repository to your local machine. Open a terminal or command prompt and use the following command:
   ```terminal
   git clone https://github.com/your-username/https---github.com-HumphreyDulo-Kihanya-Mungai-CS1.git
   ```
   Replace `your-username` with your GitHub username.
3. Change to the project directory:
   ```terminal
   cd https---github.com-HumphreyDulo-Kihanya-Mungai-CS1.git
   ```
4. Create a new **development branch** to work on your changes:
   ```terminal
   git checkout -b development
   ```
   Replace `development` with a suitable name. for your development branch
   It's recommended to create a separate branch for your changes to keep the main branch (`main` or `master`) clean and stable.

### Making Changes

1. Make the necessary code adjustments and improvements on your local machine using your preferred code editor or IDE.
2. Commit your changes with descriptive commit messages:
   ```terminal
   git commit -am "Add new feature: XYZ"
   ```
   Replace `Add new feature: XYZ` with a concise and descriptive message explaining your changes.
3. Push your changes to your forked repository:
   ```terminal
   git push origin development
   ```
   Replace `development` with a suitable name. for your development branch


### Creating a Pull Request

Once you have made your changes and pushed them to your forked repository, you can create a **Pull Request** (PR) to submit your changes for review. Follow these steps:

1. Visit the original repository page on GitHub.
2. Click on the "New Pull Request" button.
3. Set the base repository (`base repository: main` or `master`) to the original repository and branch you want to merge into.
4. Set the head repository (`head repository: your-username/https---github.com-HumphreyDulo-Kihanya-Mungai-CS1.git`) to your forked repository and the branch you made your changes on (`development`).
5. Provide a clear title and description for your PR, explaining the changes you made.
6. Click on the "Create Pull Request" button to submit your PR.

The owner of the repository will review your changes and provide feedback. Further discussions and adjustments may be required before your changes are merged into the main project.

Thank you for contributing to the Kenya Tourism Website!


Feel free to customize the instructions based on your specific repository and development workflow.

## 6. License

Specify the license under which the Kenya Tourism Website is released. Include the full license text or provide a link to the license file within your project. Make it clear how others can use, modify, and distribute the website.

## 7. Contact

For any questions, feedback or improvement suggestions, feel free to contact us via email:
- kihanya.mungai@strathmore.edu
- humphrey.dulo@strathmore.edu

## 8. Acknowledgments

## 8.1 CodeIgniter 4 Framework
The entire project above is built on the skeleton of the CodeIgniter 4 Framework.

### What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).


### Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

### Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

### Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## 8.2 Bootstrap
- [Bootstrap](https://getbootstrap.com/) - The responsive CSS framework used in this project.

## 8.3 AdminLTE

- [AdminLTE](https://adminlte.io/) - The admin dashboard template used in this project for the sidebar.

We are thankful for the open-source community and the developers behind these amazing tools and resources.


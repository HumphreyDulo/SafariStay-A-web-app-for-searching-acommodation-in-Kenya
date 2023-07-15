# Safari Stay: A Web Application for Searching Tourist Accommodation in Kenya

This web application simulates the process of finding accommodation locations.

### Prerequisites
- XAMPP (for Apache, PHP, and MySQL)
- Git
- Composer
- Stripe for payment integration
  
## ## Installation 

To automate the installation process, you can use the following bash script:

```bash
#!/bin/bash

# Safari Stay Installation Script

# Install necessary packages
echo "Installing Git..."
sleep 2
choco install git -y

echo "Installing Composer..."
sleep 2
choco install composer -y

echo "Installing XAMPP..."
sleep 2
choco install xampp -y

# Clone the Safari Stay repository
echo "Cloning Safari Stay repository..."
sleep 2
git clone [https://github.com/HumphreyDulo/SafariStay-A-web-app-for-searching-acommodation-in-Kenya.git]
cd Safari-Stay

# Set up the database
echo "Setting up the database..."
sleep 2
# Start MySQL service
cd C:/xampp
./xampp-control.exe start mysql
cd ..

# Create a new database
/c/xampp/mysql/bin/mysql.exe -u root -e "CREATE DATABASE safari_stay;"

# Run the migrations
composer install
php spark migrate

# Configure CodeIgniter
echo "Configuring CodeIgniter..."
sleep 2
# Update the database configuration
sed -i "s/'username' => 'your_username'/'username' => 'root'/" app/Config/Database.php
sed -i "s/'password' => 'your_password'/'password' => ''/" app/Config/Database.php

# Install Stripe
echo "Installing Stripe..."
sleep 2
composer require stripe/stripe-php

echo "Installation completed successfully!"
echo "You can now access Safari Stay by visiting http://localhost:8080 in your web browser."
```


### Setting up the Database Environment

1. Start the Apache and MySQL services in XAMPP control panel.

### Clone the Repository
1. Open your terminal or command prompt.
2. Navigate to the directory where you want to clone the repository.
3. Run the following command to clone the repository:
   ```terminal
   git clone [(https://github.com/HumphreyDulo/SafariStay-A-web-app-for-searching-acommodation-in-Kenya.git)]
   ```
 

### 2.4 Database Setup
1. Access the MySQL database through phpMyAdmin:
   - Open your web browser and go to `http://localhost/phpmyadmin`
   - Click on the "New" button to create a new database.
   - Give the database a name (e.g., `safari_stay`) and click "Create".
2. Open your terminal or command prompt.
3. Navigate to the project directory.
4. Run the following command to run the migrations and create the necessary tables:
   ```terminal
   php spark migrate
   ```

### 2.5 Configuring CodeIgniter
 Update the database configuration settings with your MySQL database credentials
 

### 2.6 Running the Project
1. Run the following command to start the CodeIgniter development server:
   ```terminal
   php spark serve
   ```

### Stripe

1. Sign up for a Stripe account at [stripe.com](https://stripe.com). Once you're signed up, you'll have access to your API keys, which you'll need to integrate Stripe into your project.

2. Configure PHP.ini: Open your `php.ini` file and ensure the following extensions are enabled:

   ```ini
   extension=curl
   extension=gd2
   ```

3. Set Your Stripe API Keys: In the Stripe.php configuration file, replace `'your_publishable_key'` and `'your_secret_key'` with your actual Stripe API keys:

   ```php
   \Stripe\Stripe::setApiKey('your_secret_key');
   ```

   You can find your API keys in your Stripe account dashboard.

##  Features

- Comprehensive and up-to-date information about tourist destinations in Kenya
- Search functionality to easily find tourist sites, accommodations, and tour packages
- Booking system with tracking and reporting capabilities
- Payment options including local mobile money methods
- Profiles for property owners and advertisers (vendors) to showcase their offerings
- Communication features for customers to contact property owners and advertisers


## 7. Contact

For any questions, feedback, or improvement suggestions, feel free to contact us via email:
- kihanya.mungai@strathmore.edu
- humphrey.dulo@strathmore.edu




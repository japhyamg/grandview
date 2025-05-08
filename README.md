
# GrandView Dev Test

Build a Mini Performance Management System (PMS)

# Features
User login/authentication (Admin & Standard User)

Admin dashboard to:

Add and manage “Departments” and “Employees”

Assign KPIs to employees

View performance summaries

Standard User dashboard to:

View assigned KPIs

Submit performance reports

# Set up Instruction
# Clone the Git Repository
    1. Open your terminal or command prompt.
    2. Navigate to your desired project directory.
    3. Use the git clone command to clone the repository. 
        git clone https://github.com/japhyamg/grandview.git

# Install Composer Dependencies
    1. Laravel uses Composer for PHP dependency management.
    2. Navigate to your project folder.
    3. Run composer install to install PHP dependencies.
        composer install

# Setup .env
    1. Duplicate the .env.example file and rename it to .env.
    2. Open the .env file and set your database connection details.
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

# Generate an application key.
    php artisan key:generate

# Migrate the Database
    1. Run database migrations to create tables.
    php artisan migrate

# Seed the Database 
    This will populate the database with sample data.
    Admin account and sample depts
    email: admin@example.com
    password: password

    php artisan db:seed

# Install Node.js Dependencies & Compile Assets
    npm install
    npm run dev

# Start the Development Server
    Use Artisan or XAMPP to start the Laravel development server.
    php artisan serve
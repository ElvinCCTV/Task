
## Requirements

- Composer
- Node.js and npm
- MySQL or another compatible database

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/ElvinCCTV/Task.git
   cd Task
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Install and compile frontend dependencies:
   ```
   npm install
   npm run dev
   ```

4. Create a copy of the .env file:
   ```
   cp .env.example .env
   ```

5. Generate an application key:
   ```
   php artisan key:generate
   ```

6. Configure your database in the .env file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

7. Run database migrations:
   ```
   php artisan migrate
   ```

8. Fetch data from hh.ru to database with cities data:
   ```
   php artisan parse:cities
   ```

9. Start the development server:
   ```
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser to see the application.

## Usage

- Navigate to the home page to see the list of available cities
- Select a city to view city-specific content
- Use the navigation menu to explore different pages within the selected city context

---

## Installation Instructions

### 1. Clone the Repository

First, clone the repository to your local machine using the following command:

```bash
git clone <URL-REPOSITORY>
```

Replace `<URL-REPOSITORY>` with the actual URL of your GitHub repository.

Navigate to the project directory:

```bash
cd <PROJECT-DIRECTORY>
```

---

### 2. Install Backend Dependencies (Composer)

Make sure you have [Composer](https://getcomposer.org/) installed. Then, install the required PHP dependencies by running the following command:

```bash
composer install
```

This will install the necessary libraries and dependencies for the Laravel application.

---

### 3. Install Frontend Dependencies (npm)

Ensure that [Node.js](https://nodejs.org/) and [npm](https://www.npmjs.com/) are installed on your machine. Then, install the frontend dependencies by running:

```bash
npm install
```

This will install Tailwind CSS, Bootstrap, and other JavaScript/CSS dependencies.

---

### 4. Set Up the Environment Configuration

Copy the example environment configuration file:

```bash
cp .env.example .env
```

Open the `.env` file and set up the following environment variables:

- **Database Configuration**:
  - `DB_CONNECTION`
  - `DB_HOST`
  - `DB_PORT`
  - `DB_DATABASE`
  - `DB_USERNAME`
  - `DB_PASSWORD`
  
- **Mail Configuration** (For Forgot Password and email functionality):
  - `MAIL_MAILER=smtp`
  - `MAIL_HOST=<YOUR_MAIL_HOST>`
  - `MAIL_PORT=<YOUR_MAIL_PORT>`
  - `MAIL_USERNAME=<YOUR_EMAIL_ADDRESS>`
  - `MAIL_PASSWORD=<YOUR_EMAIL_PASSWORD>`
  - `MAIL_ENCRYPTION=<YOUR_MAIL_ENCRYPTION_METHOD>` (usually `tls` or `ssl`)
  - `MAIL_FROM_ADDRESS=<FROM_EMAIL_ADDRESS>`
  - `MAIL_FROM_NAME="${APP_NAME}"`

Generate the application key by running:

```bash
php artisan key:generate
```

---

### 5. Create a Storage Link

Create a symbolic link for the `storage` folder so that images and other files can be publicly accessed:

```bash
php artisan storage:link
```

This will link the `storage/app/public` folder to the `public/storage` directory.

---

### 6. Run Database Migrations

If your application uses a database, run the migrations to set up the database schema:

```bash
php artisan migrate
```

If there are any seeders for the database, you can also run them with:

```bash
php artisan db:seed
```

---

### 7. Compile the Frontend Assets

To compile the Tailwind CSS, Bootstrap, and JavaScript, run the following command:

```bash
npm run dev
```

For production builds (minified assets), use:

```bash
npm run build
```

---

### 8. Serve the Application

To start the Laravel development server, use the following command:

```bash
php artisan serve
```

You can now access the application in your browser at:

```
http://127.0.0.1:8000
```

---

### 9. Optional: Clear Cache

If you're facing issues or want to ensure everything is up-to-date, you can clear the cache using the following commands:

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

Troubleshooting
Ensure that the storage directory has the correct permissions:

```bash
chmod -R 775 storage bootstrap/cache
chmod -R 775 public/storage
```
If you're unable to upload images, check the file upload configuration in your php.ini file (max file size, upload limits).

Ensure email configuration is correct for the Forgot Password functionality. You can test the email setup by running:

```bash
php artisan tinker
Mail::raw('Test email', function($message) {
    $message->to('recipient@example.com')->subject('Test Email');
});
```
---

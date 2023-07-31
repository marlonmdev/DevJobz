# DevJobz

<h3><b>A simple website for listing and finding Dev Jobs. This project is built using <code>Laravel 10, Bootstrap 5, AlpineJS</code>. It's functionality includes CRUD (create, read, update, delete) operations, filtering, pagination, authorization & authentication, form validations, file uploading, responsive alert notification, page routing, route middlewares. Only the registered users who logs in can post job listings while visitors can search and quick apply to job listings.</b><h3>

![Alt text](/public/images/screen1.png "DevJobz Screen 1")

![Alt text](/public/images/screen2.png "DevJobz Screen 2")

![Alt text](/public/images/screen3.png "DevJobz Screen 3")

![Alt text](/public/images/screen4.png "DevJobz Screen 4")

![Alt text](/public/images/screen5.png "DevJobz Screen 5")

## Usage

### Database Setup

This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations

To create all the nessesary tables and columns, run the following

```
php artisan migrate
```

### Seeding The Database

To add the dummy job listings with a single user, run the following

```
php artisan db:seed
```

### File Uploading

When uploading files, they go to <code>storage/app/public</code>. Create a symlink with the following command to make them publicly accessible.

```
php artisan storage:link
```

### Running The App

Place the project inside your document root (C:\xampp\htdocs\) and run

```
php artisan serve
```

or run this command on the terminal if php artisan serve does not work

```
php -S localhost:8000 -t public/
```

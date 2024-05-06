# System-College

# Features

1. Integrated Learning Management System (LMS)
2. Robust Assessment and Grading System
3. Virtual Classroom and Remote Learning Tools
4. Student Information System (SIS)
5. Financial Management Module
6. Access Control (roles and permissions)
7. Students
8. Student Profile
9. Teachers Profile
10. Settings
11. Dashboard

# Installation

Follow these steps to install the application.

1. Clone the Repository

```
git clone https://github.com/Mohamed55088/system-college.git

```

2. Go to project directory

```
cd system-college

```

3. Install packages with composer

```
composer install

```

4. Install npm packages with

```
npm install && npm run dev


```

5. Create your database

6. Rename .env.example to .env Or copy it and paste at project root directory and name the file .env.You can also use this command.

```
cp .env.example ./.env

```

7. Generate app key with this command

```
php artisan key:generate

```

8. Set database connection to your database in the .env file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dashboard1
DB_USERNAME=root
DB_PASSWORD=

```

9. Import full database sql file in the database folder, or run migrations
   Use this command to run migrations

```
php artisan migrate --seed

```

10. Start the local server and browser to your app.
    This command will start the development server

```
php artisan serve

```

11. Open the address in the terminal in your browser.Usually address is usually like this:

```
http://127.0.0.1:8000

```

12. Enjoy and make sure to star the repo :).Report bugs,features and also send your pull requests.

# admin login credentials

```
 email: admin@admin.com
 password: fulladmin
```

# Usage

-   Profile =>
    Each user has a profile of their own.
    You can update your profile credentials from this page by clicking on the edit button.
    You can also change your password by clicking on the password tab
    and choosing your new password.Also make sure you type your old password correctly

-   Managers =>
    list of all Manager in the system.
    You can add new Student by clicking on the add Student button on the Student page.
    You can add new Parents by clicking on the add Parents button on the Parents page.
    You can add new Teacher by clicking on the add Teacher button on the Teacher page.
    You can also edit user details by clicking on the edit button on the users page.
    You can easily delete a Teacher by clicking on the delete button.Parents
    You can easily delete a Parents by clicking on the delete button.
    You can easily delete a Student by clicking on the delete button.
    You can easily organizing classes.
    You can easily update data a Student by clicking on the delete button.
    You can easily update data a Teacher by clicking on the delete button.
    You can easily update data a Parents by clicking on the delete button.
    You can export or print all the Manager data by clicking on the export data button dropdown.
    Efficient Data Management: Centralize and manage student assessment data securely, ensuring compliance with regulations and facilitating informed decision-making.
    Analytics-Driven Insights: Gain actionable insights into student performance, trends, and areas needing attention, enabling proactive intervention and strategic planning.
    Customizable Reporting: Generate customizable reports for stakeholders, showcasing school performance, student progress, and areas of excellence or improvement.

-   Access Control =>
    User roles and permissions are here.
    Every user in the system has a role and each role has some number of permissions in the system.
    You can create new roles and choose their permissions.
    Click the add role button, and write the role name and choose some number of permissions you want
    the user holding this role to have and submit.
    you can edit or delete roles by clicking on either the edit button or delete button.

-   Assessment and Grading System =>
    The suppliers page has a list of all your product suppliers.
    You can add new suppliers by clicking on add supplier button on the page or from the sidebar.
    You can also edit supplier details by clicking on the edit button on the suppliers page.
    You can also delete by clicking on the delete button.

-   Teachers =>
    Effortlessly create, administer, and grade assessments with advanced tools and automation, allowing you to focus more on teaching and less on administrative tasks.
    Professional Development: Access professional development resources and training on best practices for assessment and grading, improving your skills and effectiveness in the classroom.
    You can also delete stdent by clicking on the delete button.

-   Student =>
    Assignment Submission Ease: Easily submit assignments online, track deadlines, and receive notifications for upcoming tasks, helping you stay organized and on top of your workload.
    Profile Customization: Personalize your profile with achievements, interests, and academic goals, creating a holistic view of your educational journey and accomplishments.

# How to run this system

1. First add the grades .
2. Add Students with their Classes, Parents, and teachers.
3. Make Payments for students if necessary.
4. Set Up Assessment Criteria
5. Give marks to student's subjects.
6. Generate reports as per requirement.

![db](screenshots/db.png?raw=true "sitting page")

![ScreenShot](screenshots/db2.png?raw=true " page")

![Dashboard](screenshots/col1.png?raw=true "Dashbaord page")

![page](screenshots/col2.png?raw=true "page")

![page](screenshots/col3.png?raw=true "page")

![page](screenshots/col4.png?raw=true "page")

![page](screenshots/col5.png?raw=true "page")

![page](screenshots/col6-customer.png?raw=true "profile-customer page")

![page](screenshots/col7.png?raw=true "sales page")

![page](screenshots/col8.png?raw=true "page")
![page](screenshots/col9.png?raw=true "page")
![page](screenshots/col10.png?raw=true "page")
![page](screenshots/col11.png?raw=true "page")

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

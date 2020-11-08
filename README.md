# Business Review Project

Community Open Source Project.

## Project Installation

### Prerequisites

-   PHP 7+.
-   MySql
-   A way to develop project locally (Laragon, Homestead, Valet, etc...)

For this project I recommend using Laragon since that is what I use, if you're more advance you can use anything you want, but make sure that you do not make any conflicting issues with the master branch.

### Installation

1. Run the following commands to get your project started locally:
   <small>In case you're using laragon you'll need to copy over the files to laragon directory or you can just clone inside the directory.</small>

```bash
git clone https://github.com/NikVogri/business-reviewer-laravel
cd business-reviewer-laravel && composer install && npm install
npm run dev
```

2. Create a .env file inside the main directory and copy everything from .env.example. Make sure your MySql local server is running and update the .env file with your MySql credentials.

3. Run the following command to migrate & populate your database with some fake data.

```bash
php artisan migrate:fresh --seed
```

### Usage

1.  Visit: `/businesses` to view a list of all businesses.
2.  Visit: `/businesses/create` to create your own business
3.  To authenticate use the default routes: `/register` and `/login` (links also available in the navigation).

### Credits

-   Nik Vogrinec - https://github.com/NikVogri

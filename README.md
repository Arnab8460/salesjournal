# Sales & Journal (Laravel 10)

## Setup
1. `composer install`
3. Create MySQL database (e.g. `sales_journal`).
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan serve`
7. Open `http://127.0.0.1:8000` → Sales page. Journal page: `/journal`.

## Features
- Add sale (date, customer_name, item, quantity, rate).
- total_amount auto-calculated.
- On sale create → JournalEntry created (DR Accounts Receivable / CR Sales Revenue).

## Notes
- Laravel 10 tested.
- To update journal behavior on sale update/delete, modify controllers/migrations to link sale_id.

## .env setup
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sales_journal
DB_USERNAME=root
DB_PASSWORD=

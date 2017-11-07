//make migration for new table, or new table column 
php artisan make:migration add_workout_date_to_workouts

//migrate the migrations
php artisan migrate

//roll back the migration, the last one made
php artisan migrate:rollback --step=1

//display all the existing routes
php artisan route:list
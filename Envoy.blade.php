@servers(['production' => ['yoann-le-bihan@13.39.150.46']])
 
@task('deploy', ['on' => 'production'])
    cd yoann-le-bihan.dhonnabhain.me
    git checkout production
    cd app
    composer update
    php artisan migrate
    composer install --optimize-autoloader --no-dev
@endtask
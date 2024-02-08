@servers(['production' => ['yoann-le-bihan@13.39.150.46']])

@task('deploy', ['on' => 'production'])
    cd yoann-le-bihan.dhonnabhain.me
    git checkout production
    cd app
    composer update
    npm install
    npm run build
    php artisan migrate --force
    composer install --optimize-autoloader --no-dev
    php artisan optimize:clear
    php artisan optimize
    php artisan key:generate
@endtask

@servers(['web' => ['maze@mazedlx.net']])

@task('deploy', ['on' => ['web']])
    cd /var/www/html/sports.mazedlx.net
    git stash
    php artisan down
    git pull origin main
    composer install --no-dev
    composer upgrade --no-dev
    php artisan optimize
    php artisan up
@endtask

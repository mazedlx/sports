@servers(['web' => ['maze@mazedlx.net']])

@task('deploy',  ['on' => ['web']])
    cd /var/www/html/sports.mazedlx.net
    git stash
    php8.0 artisan down
    git pull origin main
    composer install --no-dev
    php8.0 artisan optimize
    php8.0 artisan queue:restart
    php8.0 artisan up
@endtask

@servers(['hisfa' => ['root@139.162.181.121']])

@task('deploy_hisfa', ['on' => 'hisfa'])
    cd /var/www/html/hisfa5
    php artisan down
    git reset --hard HEAD
    git pull origin develop
    php composer.phar dump-autoload
    php artisan migrate --force
    php artisan up
@endtask

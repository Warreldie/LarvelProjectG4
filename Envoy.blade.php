@servers(['production' =>'aaron@139.162.134.87'])

@task('deploy', ['on' => 'production'])
cd /home/aaron/app
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar install
php composer.phar dump-autoload
php aritsan migrate --force
php artisan up
@endtask

@task('deploybeta', ['on' => 'production'])
cd /home/aaron/beta
php artisan down
git reset --hard HEAD
git pull origin beta
php composer.phar install
php composer.phar dump-autoload
php aritsan migrate --force
php artisan up
@endtask
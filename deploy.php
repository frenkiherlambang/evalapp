<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
require 'contrib/npm.php';

set('application', 'mylaravelapp');
set('repository', 'git@github.com:frenkiherlambang/evalapp.git');
set('php_fpm_version', '8.1');

host('prod')
    ->set('remote_user', 'root')
    ->set('hostname', '194.233.95.212')
    ->set('deploy_path', '/var/www/web-evaluasi');

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
]);

task('npm:run:prod', function () {
    cd('{{release_or_current_path}}');
    run('npm run build');
});

after('deploy:failed', 'deploy:unlock');

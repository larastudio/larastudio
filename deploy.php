<?php
namespace Deployer;

require 'recipe/laravel.php';
//require 'vendor/deployer/recipes/cachetool.php';

// Configuration

// Specify the repository from which to download your project's code.
// The server needs to have git installed for this to work.
// If you're not using a forward agent, then the server has to be able to clone
// your project from this repository.
set('repository', 'git@github.com:jasperf/larastudio.git');
set('default_stage', 'production');
set('git_tty', true); // [Optional] Allocate tty for git on first deployment
set('ssh_type', 'native');
set('cachetool', '/var/run/php/php7.1-fpm.sock');
// set('writable_mode', 'chmod');
// set('writable_chmod_mode', '0775');

// Hosts

host('larastud.io')
    ->user('web')
    ->forwardAgent()
    ->stage('production')
    ->set('deploy_path', '/var/www/larastud.io');

/**
 * Upload .env.production file as .env to shared
 * symlink from current loads .env from shared folder
 */

task('upload:env', function () {
    upload('.env.production', '/var/www/larastud.io/shared/.env');
})->desc('Environment setup');

// task('permissions:reset', function () {
//   run('cd {{deploy_path}}');
//   run('sudo find . -type f -exec chmod 664 {} \;');
//   run('sudo find . -type d -exec chmod 775 {} \;');
// Clear OPCache

/**
 * Main task
 */
desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'upload:env',    
    'artisan:storage:link',
    'artisan:view:clear',
    'artisan:cache:clear',
    'artisan:config:cache',
    'artisan:optimize',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);


//after('upload:env', 'cachetool:clear:opcache');
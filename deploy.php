<?php
namespace Deployer;

require 'recipe/laravel.php';

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
after('upload:env', 'cachetool:clear:opcache');
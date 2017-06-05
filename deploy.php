<?php
namespace Deployer;

require 'recipe/laravel.php';

// Configuration

set('repository', 'git@github.com:jasperf/larastudio.git');
set('default_stage', 'production');
set('git_tty', true); // [Optional] Allocate tty for git on first deployment
set('ssh_type', 'native');
set('ssh_multiplexing', true);
add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);


// Hosts

host('larastud.io')
    ->user('web')
    ->forwardAgent()
    ->stage('production')
    ->set('deploy_path', '/var/www/larastud.io');
    

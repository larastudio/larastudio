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
add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);


// Hosts

host('larastud.io')
    ->user('web')
    ->forwardAgent()
    ->stage('production')
    ->set('deploy_path', '/var/www/larastud.io');
    

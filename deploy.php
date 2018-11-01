<?php
namespace Deployer;

include_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/vendor/deployer/deployer/recipe/composer.php';

host('172.104.170.27')
	->port(22)
	->set('deploy_path', '/opt/lampp/htdocs/jian')
	->user('deploy')
	->set('branch', 'master')
	->stage('production')
	->identityFile('~/.ssh/id_rsa');

set('repository', 'git@github.com:inotsucker/bank.git');

set('keep_releases', 5);
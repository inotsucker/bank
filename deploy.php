<?php
namespace Deployer;

include_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/vendor/deployer/deployer/recipe/composer.php';

host('172.104.170.27')
	->port(22)
	->set('deploy_path', '/opt/lampp/htdocs/jian')
	->user('root')
	->set('branch', 'master')
	->stage('production')
	->configFile('~/.ssh/config')
	->identityFile('~/.ssh/id_rsa');
	->forwardAgent(true)
	->multiplexing(true)
	->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no');

set('repository', 'git@github.com:inotsucker/bank.git');

set('keep_releases', 5);

//task('deploy:composer', function () {
//    run('cd /opt/lampp/htdocs/jian/current && composer install');
//});

//task('deploy',['deploy:composer']);

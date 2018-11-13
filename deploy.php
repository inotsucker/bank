<?php
namespace Deployer;

include_once __DIR__ . '/vendor/autoload.php';
#include_once __DIR__ . '/vendor/deployer/deployer/recipe/composer.php';

host('test')
	->hostname('172.104.170.27')
	->port(22)
	->set('deploy_path', '/opt/lampp/htdocs/jian')
	->user('root')
	->set('branch', 'master')
	->configFile('~/.ssh/config')
	->identityFile('~/.ssh/id_rsa')
	->forwardAgent(true)
	->multiplexing(true)
	->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no');

set('repository', 'git@github.com:inotsucker/bank.git');

host('test2')
	->hostname('139.162.59.117')
	->port(22)
	->set('deploy_path', '/opt/lampp/htdocs/jian')
	->user('root')
	->set('branch', 'master')
	->configFile('~/.ssh/config')
//	->identityFile('~/.ssh/id_rsa')
	->forwardAgent(true)
	->multiplexing(true)
	->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no');

set('repository', 'git@github.com:inotsucker/bank.git');











desc('Pull');
task('deploy:pull', function () {
	cd('{{deploy_path}}');
	$result = run('git stash && git pull origin master && git stash pop');
	writeln($result);
});

desc('Composer Install');
task('deploy:composer', function () {
	cd('{{deploy_path}}');
	$result = run('composer install');
	writeln($result);
});

desc('Migration');
task('deploy:migrate', function () {
	cd('{{deploy_path}}');
	$result = run('php yii migrate --interactive=0');
	writeln($result);
});

task('deploy',[
	'deploy:pull',
	'deploy:composer',
	'deploy:migrate',
]);

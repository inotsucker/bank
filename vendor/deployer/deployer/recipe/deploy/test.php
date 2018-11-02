<?php

namespace Deployer;
desc('Composer Install');
task('test', function () {
    run("cd /opt/lampp/htdocs/jian/current && sudo chmod 777 assets/");
});

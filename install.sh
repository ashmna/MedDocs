#!/bin/bash

php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
unlink ./skins/dev/global
ln -s ${PWD}/global/ ./skins/dev/global
cd ./global
bower install ./bower.json
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
rmdir skins\dev\global
mklink /J skins\dev\global global
cd global
bower install .\bower.json

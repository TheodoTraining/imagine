Imagine Formation
=================

Welcome to the documentation of this small project presenting the Imagine
library. To improve the user experience, this project relies on many up-to-date
web technologies. Its installation is not complexe but require some
manipulations described below.

1) Installing NPM and NodeJS
----------------------------

As described [here][1] you can install npm easily with this command:

    curl http://npmjs.org/install.sh | sh

    sudo chown -R $USER /usr/local

This done, you can install the latest stable version of NodeJS using the
following commands:

    npm install -g n
    n stable

To check your current node version, type:

    node -v

2) Installing LESS
------------------

    npm install -g less

3) Installing Bower
-------------------

    npm install -g bower

4) Installing Symfony's vendors
-------------------------------

If you don't have [Composer][2] yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

To install all symfony project dependencies run the following command:

    php composer.phar install

Leave all default parameters for configuration.

5) Installing Javascript dependencies
-------------------------------------

    bower install

6) Installing web assets of your project
----------------------------------------

    app/console assets:install --symlink
    app/console assetic:dump

7) Run the project
------------------

    app/console server:run

The project is now available on localhost:8000 on your favorite browser.

Enjoy!

[1]:  http://howtonode.org/introduction-to-npm
[2]:  http://getcomposer.org/

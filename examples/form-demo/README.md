# Form Campaign DEMO

This is a *simple* project aimed to show how to use the Passworks PHP SDK

## Configure

First of all you sould have a Passworks Account and get yours `API credentials`
Then set it to the `config.php`

```
$API_USER    = 'username';
$API_KEY     = 'api_key';

```

Then go to the example folder, install the composer and and load the API,

```
# cd examples/form-demo
# curl -sS https://getcomposer.org/installer | php
# php composer.phar install
...
Loading composer repositories with package information
Updating dependencies (including require-dev)
  - Installing passworks/passworks-php (v2.0.1)
    Downloading: 100%

Writing lock file
Generating autoload files
```

## Create a campaign

The `generate_campaign.php` script generates a new coupon campaign and you can change it placing
your campaign's information.

> The campaign structure is documentented in this file

```
# php generate_campaign.php
```

This campaign was created with 2 CSV fields (name, email) that are supposed to be filled during
the pass creation.

## Running a basic server

For this test, you can run the basic PHP server.

```
# php -S localhost:8080
PHP 7.0.7 Development Server started at Wed Jun  1 11:14:14 2016
Listening on http://localhost:8080
Document root is /Users/pedroivo/Documents/passworks/passworks-php/examples/form-demo
Press Ctrl-C to quit.
```

Then navigate to `http://localhost:8080` and see the campaigns and create some passes

## Create passes

After create the campaign, navigate to the `http://localhost:8080` page and chose your campaign.
Then just fill the fields and create a new pass.

Note that there is a list os the passes already created with the links to each format of distribution.




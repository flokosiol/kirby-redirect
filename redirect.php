<?php

// register blueprints
$kirby->set('blueprint', 'redirect', __DIR__ . DS . 'blueprints' . DS . 'redirect.yml');

// register templates
$kirby->set('template', 'redirect', __DIR__ . DS . 'templates' . DS . 'redirect.php');

// register models
require(__DIR__ . DS . 'models' . DS . 'redirect.php');
$kirby->set('page::model', 'redirect', 'RedirectPage');

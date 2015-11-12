<?php

/*
 * Back-end routes
 */
$app->get('details', 'ParseController@details');

$app->get('/',    'FrontController@get');

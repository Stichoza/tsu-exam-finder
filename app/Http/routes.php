<?php

/*
 * Back-end routes
 */
$app->get('details', 'ParseController@details');

/*
 * Front-end routes
 */
$app->get('/', 'FrontController@index');

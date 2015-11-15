<?php

/*
 * Back-end routes
 */
$app->post('details', 'ParseController@details');

/*
 * Front-end routes
 */
$app->get('/', 'FrontController@index');

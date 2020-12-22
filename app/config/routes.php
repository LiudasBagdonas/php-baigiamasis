<?php

use Core\Router;

// Auth Controllers
Router::add('login', '/login', \App\Controllers\Common\Auth\LoginController::class, 'login');
Router::add('register', '/register', \App\Controllers\Common\Auth\RegisterController::class, 'register');
Router::add('logout', '/logout', \App\Controllers\Common\Auth\LogoutController::class, 'logout');
Router::add('install', '/install', \App\Controllers\Common\InstallController::class, 'install');

// Common Routes
Router::add('index', '/', \App\Controllers\Common\HomeController::class);
Router::add('index2', '/index.php', \App\Controllers\Common\HomeController::class);
Router::add('about', '/about', \App\Controllers\Common\CommentsController::class);

//API Routes
Router::add('post_comment', '/api/comment/post', \App\Controllers\Common\CommentsController::class, 'create');
Router::add('get_comments', '/api/comment/get', \App\Controllers\Common\CommentsController::class, 'get');

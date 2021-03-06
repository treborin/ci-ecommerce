<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CI Ecommerce Store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/assets/css/styles.css" rel="stylesheet" />
    <link href="/assets/css/master.css" rel="stylesheet" />
</head>
<body>
<?php
    $uri = service('uri');
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">CI E-Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if (session()->get('isLoggedIn')): ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>"><a class="nav-link" href="/profile">Profile</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= site_url('shop') ?>">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= site_url('shop') ?>">Popular Items</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('shop') ?>">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-light"  href="<?= site_url('cart') ?>">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-light text-dark ms-1 rounded-pill">
                        0
                    </span>
                </a>
            </form>
            <?php else: ?>
                <div class="d-inline-flex justify-content-end">
                    <ul class="float-end navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>"><a class="nav-link" href="/">Login</a></li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>"><a class="nav-link" href="/register">Register</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
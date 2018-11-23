<?php

use App\Entity\Products\Product\Product;
use App\Entity\User;
use App\Entity\Products\Category;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;

Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push('Главная', route('home'));
});


// Login
Breadcrumbs::register('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Login', route('login'));
});

Breadcrumbs::register('login.phone', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Login', route('login.phone'));
});

Breadcrumbs::register('register', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Register', route('register'));
});

Breadcrumbs::register('password.request', function (Crumbs $crumbs) {
    $crumbs->parent('login');
    $crumbs->push('Reset Password', route('password.request'));
});

Breadcrumbs::register('password.reset', function (Crumbs $crumbs) {
    $crumbs->parent('password.request');
    $crumbs->push('Change', route('password.reset'));
});


// Cabinet
Breadcrumbs::register('cabinet', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Cabinet', route('cabinet'));
});


// Administrator
Breadcrumbs::register('admin.home', function (Crumbs $crumbs) {
    $crumbs->push('Home', route('admin.home'));
});


// Users
Breadcrumbs::register('admin.users.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push('Create', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.show', $user));
});

Breadcrumbs::register('admin.users.edit', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.show', $user);
    $crumbs->push('Edit', route('admin.users.edit', $user));
});


// Product Category
Breadcrumbs::register('admin.products.categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Категории', route('admin.products.categories.index'));
});
Breadcrumbs::register('admin.products.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.products.categories.index');
    $crumbs->push('Create', route('admin.products.categories.create'));
});

Breadcrumbs::register('admin.products.categories.show', function (Crumbs $crumbs, Category $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.products.categories.show', $parent);
    } else {
        $crumbs->parent('admin.products.categories.index');
    }
    $crumbs->push($category->name_original, route('admin.products.categories.show', $category));
});

Breadcrumbs::register('admin.products.categories.edit', function (Crumbs $crumbs, Category $category) {
    $crumbs->parent('admin.products.categories.show', $category);
    $crumbs->push('Edit', route('admin.products.categories.edit', $category));
});

Breadcrumbs::register('admin.products.products.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Товары', route('admin.products.products.index'));
});

Breadcrumbs::register('admin.products.products.show', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.products.products.index');
    $crumbs->push($product->name_original, route('admin.products.products.show', $product));
});



//------
Breadcrumbs::register('products.index', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Каталог', route('products.index'));
});

Breadcrumbs::register('categories.show', function (Crumbs $crumbs, Category $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('categories.show', $parent);
    } else {
        $crumbs->parent('home');
    }
    $crumbs->push($category->name == null ? $category->name_original : $category->name, route('categories.show', $category));
});


// Product SHOW
Breadcrumbs::register('product.show', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('categories.show', $product->category);
    $crumbs->push($product->name_original, route('product.show', $product));
});

Breadcrumbs::register('product.search', function (Crumbs $crumbs) {
    $crumbs->push('Поиск', route('product.search'));
});

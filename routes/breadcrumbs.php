<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

// Home / Author
Breadcrumbs::for('author', function($trail, \App\User $user) {
    $trail->parent('home');
    $trail->push($user->name, route('author', $user));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, \App\Category $category) {
    $trail->parent('blog');
    $trail->push($category->name, route('category', $category->slug));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, \App\Post $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});

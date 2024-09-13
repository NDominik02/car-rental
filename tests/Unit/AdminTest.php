<?php

use Illuminate\Support\Facades\Config;
use function Pest\Laravel\withHeaders;

beforeEach(function () {
    Config::set('admin.username', 'admin');
    Config::set('admin.password', 'password123');
});

it('grants access with valid credentials', function () {
    withHeaders([
        'Username' => 'admin',
        'Password' => 'password123',
    ])
        ->get('/admin')
        ->assertStatus(200);
});

it('denies access with invalid credentials', function () {
    withHeaders([
        'Username' => 'wronguser',
        'Password' => 'wrongpassword',
    ])
        ->get('/admin')
        ->assertRedirect('/');
});

<?php

test('Login Succesfuly', function () {
    $response = $this->post('/login', [
        'email' => 'edo@gmail.com',
        'password' => '12345678',
    ]);

    $response->assertStatus(301);
    $response->assertRedirect('/home');
    $response->hasNoSessionErrors();
});

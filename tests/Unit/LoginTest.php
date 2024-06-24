<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\post;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('Redirect to Setup Page When No Users', function () {
    $response = get('/login');
    $response->assertRedirect('/setup');
});
test('Login Page', function () {
    User::factory()->create();
    $response = get('/login');
    $response->assertStatus(200);
    assertGuest();
});

test('Cannot Access Login Page When Authenticated', function () {
    $user = User::factory()->create();
    $response = actingAs($user)->get('/login');
    $response->assertSessionHasNoErrors();
    $response->assertRedirect('/home');
});

test('Login Validation', function () {
    post('/login', [csrf_field(), 'email' => '', 'password' => ''])
        ->assertSessionHasErrors(['email', 'password']);
});

it('can login with valid credentials', function () {
    User::factory()->create([
        'email' => 'edo@gmail.com',
        'password' => bcrypt('password')
    ]);
    $response = post('/login', [
        csrf_field(),
        'email' => 'edo@gmail.com',
        'password' => 'password'
    ]);
    $response->assertRedirect('/home');
    $this->assertAuthenticated();
});

it('cannot login with invalid email', function () {
    User::factory()->create([
        'email' => 'edo@gmail.com',
        'password' => bcrypt('password')
    ]);
    $response = post('/login', [
        csrf_field(),
        'email' => 'edi@gmail.com',
        'password' => 'password'
    ]);
    $this->assertGuest();
    $response->assertSessionHasErrors();
});

it('cannot login with invalid password', function () {
    User::factory()->create([
        'email' => 'edo@gmail.com',
        'password' => bcrypt('password')
    ]);
    $response = post('/login', [
        csrf_field(),
        'email' => 'ed0@gmail.com',
        'password' => 'passwor'
    ]);
    assertGuest();
    $response->assertSessionHasErrors();
});
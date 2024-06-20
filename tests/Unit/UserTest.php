<?php
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

// test('Create permission writer', function () {
//     $user = User::factory()->create();
//     actingAs($user)->post('/admin/roles', [
//         'name' => 'admin',
//         'permission' => 'create user'
//     ])->ddSession();
// });

<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
// Broadcast::channel('admin.{id}', function ($admin, $id) {
//     return (int) $admin->id === (int) $id;
// }, ['guards' => ['admin']]);
Broadcast::channel('admin.{id}', function ($admin, $id) {
   return (int) $admin->id === (int) $id;
}, ['guards' => ['admin']]);




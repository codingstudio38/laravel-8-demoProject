<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('message-channel', function ($user) {
    return true;
    // return session()->has('user') ? true : false; 
});
Broadcast::channel('public-channel', function ($user) {
    return true;
});

Broadcast::channel('track-message-channel', function ($user) {
    // return User::first();
    return $user;
}); 
<?php

namespace CodeShopping\Listeners;

use CodeShopping\Events\UserCreateEvent;
use CodeShopping\Models\User;

class SendEmailToDefinePassword
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreateEvent  $event
     * @return void
     */
    public function handle(UserCreateEvent $event)
    {
        $user =  $event->getUser();
        $token = \Password::broker()->createToken($user);
        $user->sendPasswordResetNotification($token);
        //$user->notify(new MyNotification($token));
    }
}

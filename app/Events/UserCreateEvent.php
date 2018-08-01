<?php
declare(strict_types=1);
namespace CodeShopping\Events;

use CodeShopping\Models\User;

class UserCreateEvent
{

    private $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
    
}

<?php

namespace Tests\Models;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testPaymentLink()
    {
        $user = new User();
        $this->assertClassHasAttribute('');
    }
}

<?php

namespace App\Domain\Email\Observers;

use App\Domain\Email\Model\Email;

interface EmailObserverInterface
{
    public function update(Email $email): void;
}

<?php

namespace App\Application;

use App\Domain\Email\Model\Email;

class EmailNotifier extends EmailNotifierObserver
{
    public function emailReceived(Email $email): void
    {
        $this->notifyObservers($email);
    }
}

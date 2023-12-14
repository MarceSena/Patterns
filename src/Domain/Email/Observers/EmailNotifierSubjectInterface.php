<?php

namespace App\Domain\Email\Observers;

use App\Domain\Email\Model\Email;

interface EmailNotifierSubjectInterface
{
    public function attach(EmailObserverInterface $observer): void;
    public function detach(EmailObserverInterface $observer): void;
    public function notifyObservers(Email $email): void;
}

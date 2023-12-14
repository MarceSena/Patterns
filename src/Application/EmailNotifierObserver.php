<?php

namespace App\Application;

use App\Domain\Email\Model\Email;
use App\Domain\Email\Observers\EmailNotifierSubjectInterface;
use App\Domain\Email\Observers\EmailObserverInterface;

abstract class EmailNotifierObserver implements EmailNotifierSubjectInterface
{
    private array $observers;

    public function __construct(array $observers = [])
    {
        $this->observers = $observers;
    }

    public function attach(EmailObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(EmailObserverInterface $observer): void
    {
        $index = array_search($observer, $this->observers, true);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notifyObservers(Email $email): void
    {
        /** @var EmailObserverInterface $observer */
        foreach ($this->observers as $observer) {
            $observer->update($email);
        }
    }

    public function getObservers(): array
    {
        return $this->observers;
    }
}

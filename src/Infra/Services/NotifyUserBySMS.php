<?php

declare(strict_types=1);

namespace App\Infra\Services;

use App\Domain\Email\Model\Email;
use App\Domain\Email\Observers\EmailObserverInterface;

class NotifyUserBySMS implements EmailObserverInterface
{
    private $simulateFailure;

    public function __construct(?bool $simulateFailure = false)
    {
        $this->simulateFailure = $simulateFailure;
    }

    public function update(Email $email): void
    {
        $notify = $this->notifyUserBySMS($email);
        if (!$notify) {
            throw new \Exception('Falha ao notificar o usuário');
        }
    }

    private function notifyUserBySMS(Email $email): bool
    {
        if ($this->simulateFailure) {
            return false;
        }

        $service  = "Essa notificação foi enviada pelo serviço: " . get_class($this) . "\n";
        $subject = "Assunto: " . $email->getSubject() . "\n";
        $body =  "Corpo: " . $email->getBody() . "\n";

        $message = $service . $subject . $body . "<br> <br>";

        echo $message;

        return true;
    }
}

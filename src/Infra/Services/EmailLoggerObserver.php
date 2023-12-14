<?php

namespace App\Infra\Services;

use App\Domain\Email\Model\Email;
use App\Domain\Email\Observers\EmailObserverInterface;

class EmailLoggerObserver implements EmailObserverInterface
{
    public function update(Email $email): void
    {
        $service  = "Essa notificação foi enviada pelo serviço: " . get_class($this) . "\n";
        $subject = "Assunto: " . $email->getSubject() . "\n";
        $body =  "Corpo: " . $email->getBody() . "\n";

        $logMessage = $service . $subject . $body . "<br> <br>";

        $filePath = '/var/www/html/public/email_log.txt';
        file_put_contents($filePath, $logMessage . PHP_EOL, FILE_APPEND);

        echo $logMessage;
    }
}

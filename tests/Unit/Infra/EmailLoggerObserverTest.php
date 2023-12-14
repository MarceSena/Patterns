<?php

namespace Tests\Unit\Infra;

use App\Domain\Email\Model\Email;
use App\Infra\Services\EmailLoggerObserver;
use PHPUnit\Framework\TestCase;

class EmailLoggerObserverTest extends TestCase
{
    //TODO: melhorar a classe EmailLoggerObserver para ser possivel testar sem modificar arquivos em memoria
    public function testUpdate()
    {
        $filePath = '/var/www/html/public/email_log.txt';

        $email = $this->createMock(Email::class);
        $logger = $this->createStub(EmailLoggerObserver::class);

        $email = new Email("Assunto", "Corpo do e-mail");
        $logger->update($email);

        $this->assertFileExists($filePath);
    }
}

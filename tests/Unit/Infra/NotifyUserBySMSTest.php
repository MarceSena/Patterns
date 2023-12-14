<?php

namespace Tests\Unit\Infra;

use App\Domain\Email\Model\Email;
use App\Domain\Email\Observers\EmailObserverInterface;
use App\Infra\Services\NotifyUserBySMS;
use PHPUnit\Framework\TestCase;

class NotifyUserBySMSTest extends TestCase
{
    public function testNotifySuccess()
    {
        $observer = new NotifyUserBySMS();

        $email = new Email('Assunto Teste', 'Corpo do e-mail Teste');
        $observer->update($email);

        $this->assertTrue(true);
    }

    public function testNotifyNotSuccess()
    {
        $observer = new NotifyUserBySMS(true);

        $email = new Email('Assunto Teste', 'Corpo do e-mail Teste');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Falha ao notificar o usuário');

        $observer->update($email);
    }
}

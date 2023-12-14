<?php

namespace Tests\Unit\Infra;

use App\Domain\Email\Model\Email;
use App\Infra\Services\NotifyUserByWhatsapp;
use PHPUnit\Framework\TestCase;

class NotifyUserByWhatsappTest extends TestCase
{
    public function testNotifySuccess()
    {
        $observer = new NotifyUserByWhatsapp();

        $email = new Email('Assunto Teste', 'Corpo do e-mail Teste');
        $observer->update($email);

        $this->assertTrue(true);
    }

    public function testNotifyNotSuccess()
    {
        $observer = new NotifyUserByWhatsapp(true);

        $email = new Email('Assunto Teste', 'Corpo do e-mail Teste');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Falha ao notificar o usuário');

        $observer->update($email);
    }
}

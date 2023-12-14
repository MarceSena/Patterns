<?php

namespace Tests\Unit\Domain;

use App\Domain\Email\Model\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testCreateEmail()
    {
        $email = new Email("Assunto", "Corpo da mensagem");
        $this->assertEquals("Assunto", $email->getSubject());
        $this->assertEquals("Corpo da mensagem", $email->getBody());
        $this->assertIsString($email->getSubject());
        $this->assertIsString($email->getBody());
        $this->assertInstanceOf(Email::class, $email);
    }
}

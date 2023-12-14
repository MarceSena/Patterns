<?php

namespace Tests\Unit\Application;

use App\Application\EmailNotifier;
use App\Domain\Email\Model\Email;
use App\Domain\Email\Observers\EmailObserverInterface;
use PHPUnit\Framework\TestCase;

class EmailNotifierTest extends TestCase
{
    public function testAttachObserver()
    {
        $notifier = new EmailNotifier();
        $obsever = $this->createMock(EmailObserverInterface::class);

        $notifier->attach($obsever);

        $this->assertContains($obsever, $notifier->getObservers());
        $this->assertCount(1, $notifier->getObservers());
    }


    public function testDetachObserver()
    {
        $notifier = new EmailNotifier();
        $obsever = $this->createMock(EmailObserverInterface::class);
        $obsever2 = $this->createMock(EmailObserverInterface::class);

        $notifier->attach($obsever);
        $this->assertContains($obsever, $notifier->getObservers());
        $this->assertCount(1, $notifier->getObservers());

        $notifier->attach($obsever2);
        $this->assertCount(2, $notifier->getObservers());

        $notifier->detach($obsever);
        $this->assertCount(1, $notifier->getObservers());

        $notifier->detach($obsever2);
        $this->assertCount(0, $notifier->getObservers());
        $this->assertNotContains([$obsever, $obsever2], $notifier->getObservers());
    }

    public function testNotifyObservers()
    {
        $notifier = new EmailNotifier();
        $obsever = $this->createMock(EmailObserverInterface::class);
        $obsever2 = $this->createMock(EmailObserverInterface::class);

        $notifier->attach($obsever);
        $notifier->attach($obsever2);

        $obsever->expects($this->once())->method('update');
        $obsever2->expects($this->once())->method('update');

        $notifier->notifyObservers($this->createMock(Email::class));
    }
}

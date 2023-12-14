<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Domain\Email\Model\Email;
use App\Application\EmailNotifier;
use App\Infra\Services\EmailLoggerObserver;
use App\Infra\Services\NotifyUserByWhatsapp;
use App\Infra\Services\NotifyUserBySMS;

$notificationService = new EmailNotifier();

$loggerService = new EmailLoggerObserver();
$whatsappService = new NotifyUserByWhatsapp();
$smsService = new NotifyUserBySMS();

// Adiciona observadores
$notificationService->attach($loggerService);
$notificationService->attach($whatsappService);
$notificationService->attach($smsService);


$receivedEmail = new Email("Novo Email", "Ola, tudo bem?");

// Simula recebimento de e-mail
$notificationService->emailReceived($receivedEmail);

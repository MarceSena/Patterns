<?php

namespace App\Domain\Email\Model;

class Email
{
    private string $subject;
    private string $body;

    public function __construct(string $subject, string $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject($subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody($body): self
    {
        $this->body = $body;

        return $this;
    }
}

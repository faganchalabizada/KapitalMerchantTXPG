<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

class Error
{
    private $code;
    private string $title;
    private string $description;

    public function __construct($code, string $title, string $description)
    {
        $this->code = $code;
        $this->title = $title;
        $this->description = $description;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
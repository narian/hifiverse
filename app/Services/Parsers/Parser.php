<?php

namespace App\Services\Parsers;

use App\Services\GptService;

class Parser
{
    protected GptService $gptService;

    public function __construct()
    {
        $this->gptService = new GptService();
    }
}

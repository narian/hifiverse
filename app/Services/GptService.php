<?php

namespace App\Services;

class GptService
{
    private string $promptsPath;
    private string $categoriesListPromptName = "00-categories-list-prompt.txt";
    private string $categorySelectPromptName = "01-category-select-prompt.txt";
    private string $matchCharInEq = "02-match-chars-in-eq.txt";

    public function __construct() {
       $this->promptsPath = resource_path("prompts");
    }

    //
    public function requestPrompt($text) {

    }

    //
    public function getCategoriesListPrompt() {
        return file_get_contents( $this->promptsPath . "/" . $this->categoriesListPromptName);
    }

    //
    public function getCategorySelectPrompt() {
        return file_get_contents( $this->promptsPath . "/" . $this->categorySelectPromptName);
    }

    //
    public function getMatchCharInEq() {
        return file_get_contents( $this->promptsPath . "/" . $this->matchCharInEq);
    }
}

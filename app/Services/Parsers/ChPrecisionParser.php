<?php

namespace App\Services\Parsers;

use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;
use voku\helper\HtmlDomParser;

class ChPrecisionParser extends Parser implements IParser
{
    private static $catalogLists = [
        "https://www.ch-precision.com/ch-cat/series/10-series/",
        "https://www.ch-precision.com/ch-cat/series/1-series/",
    ];

    private $productUrls = [];


    //
    public function getPagesUrls() {
        foreach (self::$catalogLists as $listUrl) {
            $rawPage = file_get_contents($listUrl);

            $dom = HtmlDomParser::str_get_html($rawPage);
            $nodesList = $dom->findMulti('.product-small p.name.product-title > a');
            foreach($nodesList as $node) {
                $this->productUrls[] = [
                    "url" => $node->getAttribute("href"),
                    "name" => $node->text,
                ];
            }
        }
        return $this->productUrls;
    }

    //
    public function parseProductsData($productsUrls) {
        if(count($this->productUrls) == 0) {
            $this->productUrls = $productsUrls;
        }

        $productUrl = $this->productUrls[0];
        // foreach($this->productUrls as $productUrl) {
            // check if page is saved
            // if so, skip it

            $page = file_get_contents($productUrl["url"]);

            // get prompt with categories
            $categoryListPromptText = $this->gptService->getCategoriesListPrompt();
            $categorySelectPromptText = $this->gptService->getCategorySelectPrompt();

            // strip tags on page and send to gpt for determination of category
            $nodes = HtmlDomParser::str_get_html($page);
            $pageTitle = implode("", $nodes->find("title")->text);
            $pageBody = $nodes->find("body .shop-container")->innerhtml;
            $pageBody = preg_replace('/\t/m', '', $pageBody);
            $pageBody = strip_tags( implode("", $pageBody), ["img"] );
            $pageBody = preg_replace('/\s+/', ' ', $pageBody);

            $prompt = $categoryListPromptText . "\n" . $categorySelectPromptText . "\n" . "Title - " . $pageTitle . "\n" . $pageBody;
            //dd($prompt);
            $chat = [
                ["role" => "user", "content" => $prompt],
                ["role" => "user", "content" => "Answer only with founded key in string format or with null if you did not find any category"],
            ];

            $gptResponses = [];
            $response = OpenAI::chat()->create([
                "model" => 'gpt-3.5-turbo',
                "messages" => $chat,
            ]);
            $gptResponses[] = $response;

            $chat[] = $response->choices[0]->message->toArray();
            $categoryKey = $response->choices[0]->message->content;

            if($categoryKey == null) {
                print "Can't find category for url: " . $productUrl . "\n";
            }

            try {
                $categorySchema = file_get_contents( resource_path("prompts/categories/schema-" . $categoryKey . ".txt") );
                $matchPrompt = $this->gptService->getMatchCharInEq();

                $chat[] = ["role" => "user", "content" => $matchPrompt . "\n" . $categorySchema];
            } catch (\Exception $e) {
                dd("test 1: ", $gptResponses, $chat, $e, $e->getMessage());
            }

            try {
                $response = OpenAI::chat()->create([
                    "model" => 'gpt-3.5-turbo',
                    "messages" => $chat,
                ]);
                $gptResponses[] = $response;
                $chat[] = $response->choices[0]->message->toArray();
            } catch (\Exception $e) {
                dd("test 2: ", $gptResponses, $chat, $e, $e->getMessage());
            }

            $log = `{
                "responses": ` . json_encode($gptResponses) . `,
                "chat": ` . json_encode($chat) . `,
            }`;

            Log::build([
                'path' => storage_path('logs/chatgpt/' . date("Y-m-d-H-i-s") . '.log'),
            ])->info( json_decode(json_encode($log), true) . "\n\n\n" );

            dd("test 3: ", $gptResponses, $chat, $log);


            // get data schema for determined category and send it to gpt for finding values
            // get values and add them to model
            // log everything

            // save page after everything is done
        // }
    }

    //
    public function getPageSpecsContentBlock() {

    }


}

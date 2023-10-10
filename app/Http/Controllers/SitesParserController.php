<?php

namespace App\Http\Controllers;

use App\Services\Parsers\ChPrecisionParser;
use Illuminate\Http\Request;

class SitesParserController extends Controller
{
    private ChPrecisionParser $chPrecisionParser;

    //
    public function __construct(ChPrecisionParser $chPrecisionParser) {
        $this->chPrecisionParser = $chPrecisionParser;
    }

    //
    public function getUrls() {
        $urls = $this->chPrecisionParser->getPagesUrls();
        $this->chPrecisionParser->parseProductsData($urls);

        // dd( $this->chPrecisionParser->getPagesUrls() );
    }
}

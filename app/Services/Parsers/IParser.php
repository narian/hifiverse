<?php

namespace App\Services\Parsers;

interface IParser
{
    // getting urls of single product pages from catalog list
    public function getPagesUrls();

    // getting page and find specifications block by its selector
    public function getPageSpecsContentBlock();

}

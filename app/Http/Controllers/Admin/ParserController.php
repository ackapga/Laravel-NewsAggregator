<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * @param Request $request
     * @param Parser $parser
     * @return void
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $link = $parser->setLink('http://www.cbr.ru/rss/nregimr2')->getParseDate();

        dd($link);
    }
}

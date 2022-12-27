<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * @return string
     */
    public function __invoke(): string
    {
        $urls = [
            'https://news.rambler.ru/rss/technology',
            'https://news.rambler.ru/rss/holiday',
            'https://news.rambler.ru/rss/gifts',
            'https://news.rambler.ru/rss/novyy-god-2023',
            'https://news.rambler.ru/rss/world',
            'https://news.rambler.ru/rss/starlife',
            'https://news.rambler.ru/rss/games',
            'https://news.rambler.ru/rss/photo',
            'https://news.rambler.ru/rss/podcast',
            'https://news.rambler.ru/rss/video',
        ];

        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url));
           // Можно и так: JobNewsParsing::dispatch($url);
        }

        return "Parsing completed!!!";

    }
}

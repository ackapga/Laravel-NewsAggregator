<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParsesService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseDate(): void
    {
        $xml = XmlParser::load($this->link);

        $date = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'language' => [
                'uses' => 'channel.language'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[guid,title,link,pubDate,description,category,author]'
            ],

        ]);

        $urlWithoutSlash = \explode("/", $this->link);
        $fileName = end($urlWithoutSlash);
        $jsonEncode = json_encode($date);

        Storage::append('newsList/' . $fileName, $jsonEncode);
    }
}

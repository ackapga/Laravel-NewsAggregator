<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;
use App\Models\News;
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
            'description' => [
                'uses' => 'channel.description'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[category,title,author,description,link,pubDate]'
            ],

        ]);

        self::saveCategory($date);
        self::saveNews($date);
        self::saveStorageJson($this->link, $date);
    }


    /**
     * Этот метод сохраняет новости в виде Json в DISK Laravel.
     * Принимает ссылку RSS и XML массив нужных полей для Parses.
     *
     * ../storage/app/public/JsonNewsFromQueue/
     *
     * @param string $link Указать URL RSS ссылку
     * @param array $date Указать массив XML
     * @return void
     */
    private static function saveStorageJson(string $link, array $date)
    {
        $urlWithoutSlash = explode("/", $link);
        $fileName = end($urlWithoutSlash);
        $jsonEncode = json_encode($date);
        Storage::append('public/JsonNewsFromQueue/' . $fileName, $jsonEncode);
    }

    /**
     * @param array $array
     * @return void
     */
    private static function saveCategory(array $array): void
    {
        $box = $array['news'];

        $titleList = array_column($box, 'category');
        $titleUnique = array_unique($titleList);

        $titleDB = Category::query()->select('title')->get()->toArray();
        $titleDBList = array_column($titleDB, 'title');

        foreach ($titleUnique as $one) {

            $categoryArray = [
                'title' => $one,
                'description' => $array['description'] . ': ' . $array["title"],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (in_array($one, $titleDBList)) {
                break;
            } else {
                Category::query()->insert($categoryArray);
            }
        }
    }

    /**
     * @param array $array
     * @return void
     */
    private static function saveNews(array $array): void
    {
        $box = $array['news'];
        $image = $array['link'] . $array['image'];

        $titleDB = News::query()->select('title')->get()->toArray();
        $titleDBList = array_column($titleDB, 'title');

        foreach ($box as $one) {

            $categoryName = $one['category'];
            $categoryTakeId = Category::query()
                ->select('id')
                ->where('title', '=', $categoryName)
                ->get()
                ->toArray();
            $category_id = $categoryTakeId[0]['id'];

            $news = [
                'category_id' => $category_id,
                'title' => $one['title'],
                'author' => $one['author'],
                'status' => News::ACTIVE,
                'image' => $image,
                'description' => $one['description'] . "<br>" . ' <a href="' . $one['link'] . '" target="_blank">' . 'Ссылка на статью' . '</a>',
                'created_at' => now(),
            ];

            if (in_array($one['title'], $titleDBList)) {
                break;
            } else {
                News::query()->insert($news);
            }
        }
    }

}

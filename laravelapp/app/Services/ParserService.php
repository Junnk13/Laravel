<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Models\Sources;
use App\Services\Contract\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;
        return $this;
    }

    public function parse(): void
    {
        $xml = XMLParser::load($this->link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'lastBuildDate' => ['uses' => 'lastBuildDate'],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        $category = [
            'title' => $data['title']
        ];
        $news = [];
        foreach ($data as $newsItem) {
            $news = $newsItem;
        }

        //проверка если ли такая категория, если-нет =>создами, или получим id категории
        $oldCategory = Category::where('title', $data['title'])->exists();
        if ($oldCategory) {
            foreach (Category::where('title', $data['title'])->get() as $category) {
                $categoryId = $category->id;
            }
        } else {
            $newCategory = Category::create($category);
            if ($newCategory) {
                $categoryId = $newCategory->id;
            }
        }
        $newsCount = count($news);
        //создаем новости
        for ($i = 0; $i < $newsCount; $i++) {
            $createNews['title'] = $news[$i]['title'];
            $shortDescription = mb_strimwidth($news[$i]['description'], 0, 60);
            $shortDescription = mb_substr($shortDescription, 0, mb_strrpos($shortDescription, " ")) . "...";
            $createNews['short_description'] = $shortDescription;
            $createNews['full_description'] = $news[$i]['description'];
            $createNews['category_id'] = $categoryId;
            News::create($createNews);
        }

        //очистим таблицу sources
        Sources::where('url',$this->link)->delete();

    }
}

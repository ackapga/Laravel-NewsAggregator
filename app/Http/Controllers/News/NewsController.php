<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use function view;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $builder)
    {
        $news = $builder->getNewsForList();
       return view('news.index', ['newsList' => $news]);
    }

    public function show(int $id)
    {
        $news = app(News::class)->getNewsById($id);
        return view('news.show', ['news' => $news]);
    }

}

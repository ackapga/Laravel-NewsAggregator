<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $builder): Factory|View|Application
    {
        $news = $builder->getNewsForList();
       return view('news.index', ['newsList' => $news]);
    }

    public function show(NewsQueryBuilder $builder, $id): Factory|View|Application
    {
        $news = $builder->getNewsById($id);
        return view('news.show', ['news' => $news]);
    }

}

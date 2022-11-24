<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param NewsQueryBuilder $builder
     * @return View|Factory|Application
     */
    public function index(NewsQueryBuilder $builder): View|Factory|Application
    {
        $categories = Category::query()->select(Category::$selectedFiled)->get();
        return view('admin.news.index', [
            'newsList' => $builder->getNews(),
            'categories' => $categories,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * @param Request $request
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        Request $request,
        NewsQueryBuilder $builder
    ): RedirectResponse {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $news = $builder->create(
            $request->only([
                'category_id',
                'title',
                'author',
                'status',
                'image',
                'description',
            ])
        );

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно добавленная!');
        }
        return back()->with('error', 'Не удалось добавить новость!');
    }

    /**
     * @param News $news
     * @return View|Factory|Application
     */
    public function edit(News $news): View|Factory|Application
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
        ]);
    }

    /**
     * @param Request $request
     * @param News $news
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        Request          $request,
        News             $news,
        NewsQueryBuilder $builder
    ): RedirectResponse {
        if ($builder->update($news, $request->only([
            'category_id',
            'title',
            'author',
            'status',
            'image',
            'description',
        ]))) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно обновлена!');
        }
        return back()->with('error', 'Не удалось обновить новость!');
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}

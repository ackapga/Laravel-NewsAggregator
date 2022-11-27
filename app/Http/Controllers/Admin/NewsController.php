<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    /**
     * @param NewsQueryBuilder $news
     * @return View|Factory|Application
     */
    public function index(NewsQueryBuilder $news): View|Factory|Application
    {
        return view('admin.news.index', [
            'newsList' => $news->getNews(),
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
     * @param CreateRequest $request
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest    $request,
        NewsQueryBuilder $builder
    ): RedirectResponse
    {
        $news = $builder->create(
            $request->validated()
        );

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.store.success'));
        }
        return back()->with('error', __('messages.admin.news.store.error'));
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
     * @param EditRequest $request
     * @param News $news
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        EditRequest      $request,
        News             $news,
        NewsQueryBuilder $builder
    ): RedirectResponse
    {
        if ($builder->update($news, $request->validated())) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.error'));
    }

    /**
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', __('messages.admin.news.destroy.success'));
    }
}

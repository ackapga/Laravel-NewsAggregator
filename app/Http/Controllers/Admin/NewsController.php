<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $categories = Category::query()->select(Category::$selectedFiled)->get();
        $news = News::query()->select(News::$selectedFiled)->get();
        return view('admin.news.index', [
            'newsList' => $news,
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
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $news = new News(
            $request->only([
                'category_id',
                'title',
                'author',
                'status',
                'image',
                'description',
            ])
        );

        if ($news->save()) {
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
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news->category_id = $request->input('category_id');
        $news->title = $request->input('title');
        $news->author = $request->input('author');
        $news->status = $request->input('status');
        $news->image = $request->input('image');
        $news->description = $request->input('description');

        if ($news->save()) {
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

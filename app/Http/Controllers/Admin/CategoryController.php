<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $categories = Category::query()->select(Category::$selectedFiled)->get();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.categories.create');
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

        $categories = new Category(
            $request->only(['title', 'description'])
        );

        if ($categories->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно добавленная!');
        }
        return back()->with('error', 'Не удалось добавить запись!');
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): View|Factory|Application
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно обновлена!');
        }
        return back()->with('error', 'Не удалось обновить запись!');
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

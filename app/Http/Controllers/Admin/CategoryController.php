<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param CategoriesQueryBuilder $builder
     * @return View|Factory|Application
     */
    public function index(CategoriesQueryBuilder $builder): View|Factory|Application
    {
        $categories = $builder->getCategories();
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
     * @param CategoriesQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        Request                $request,
        CategoriesQueryBuilder $builder
    ): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $categories = $builder->create(
            $request->only(['title', 'description'])
        );

        if ($categories) {
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
     * @param CategoriesQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        Request                $request,
        Category               $category,
        CategoriesQueryBuilder $builder
    ): RedirectResponse {
        if ($builder->update($category, $request->only([
            'title',
            'description'
        ]))) {
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

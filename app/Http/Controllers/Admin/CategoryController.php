<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * @param CategoriesQueryBuilder $builder
     * @return View|Factory|Application
     */
    public function index(CategoriesQueryBuilder $builder): View|Factory|Application
    {
        return view('admin.categories.index', [
            'categories' => $builder->getCategories(),
            'number' => count($builder->getCategories()),
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
     * @param CreateRequest $request
     * @param CategoriesQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest          $request,
        CategoriesQueryBuilder $builder
    ): RedirectResponse
    {
        $categories = $builder->create(
            $request->validated()
        );

        if ($categories) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.store.success'));
        }
        return back()->with('error', __('messages.admin.categories.store.error'));
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
     * @param EditRequest $request
     * @param Category $category
     * @param CategoriesQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        EditRequest            $request,
        Category               $category,
        CategoriesQueryBuilder $builder
    ): RedirectResponse
    {
        if ($builder->update($category, $request->validated())) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.update.success'));
        }
        return back()->with('error', __('messages.admin.categories.update.error'));
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', __('messages.admin.categories.destroy.success'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resources\CreateRequest;
use App\Http\Requests\Resources\EditRequest;
use App\Models\Resources;
use App\Queries\ResourcesQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    /**
     * @param ResourcesQueryBuilder $resources
     * @return View|Factory|Application
     */
    public function index(ResourcesQueryBuilder $resources): View|Factory|Application
    {
        return view('admin.index', [
            'resources' => $resources->getResources()
        ]);
    }

    /**
     * @param CreateRequest $request
     * @param ResourcesQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest         $request,
        ResourcesQueryBuilder $builder
    ): RedirectResponse
    {
        $categories = $builder->create($request->validated());

        if ($categories) {
            return redirect()->route('admin.resources.index')
                ->with('success', __('messages.admin.resources.store.success'));
        }
        return back()->with('error', __('messages.admin.resources.store.error'));
    }


    public function update(
        ResourcesQueryBuilder $builder,
        EditRequest           $request
    ): RedirectResponse
    {
        if ($builder->update($request->validated())) {
            return redirect()->route('admin.resources.index')
                ->with('success', __('messages.admin.resources.update.success'));
        }
        return back()->with('error', __('messages.admin.resources.update.error'));
    }


    /**
     * @param ResourcesQueryBuilder $resources
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(ResourcesQueryBuilder $resources, $id): RedirectResponse
    {
        $resources->delete($id);
        return redirect()->route('admin.resources.index')
            ->with('success', __('messages.admin.resources.destroy.success'));
    }
}

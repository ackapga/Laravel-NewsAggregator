<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resources\CreateRequest;
use App\Http\Requests\Resources\EditRequest;
use App\Models\Job;
use App\Models\JobFailed;
use App\Queries\ResourcesQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * @param ResourcesQueryBuilder $resources
     * @param Job $job
     * @return View|Factory|Application
     */
    public function index(
        ResourcesQueryBuilder $resources,
        Job                   $job,
        JobFailed             $jobFailed,
    ): View|Factory|Application
    {
        return view('admin.index', [
            'resources' => $resources->getResources(),
            'job' => $job::query()->select('payload')->get(),
            'jobFailed' => $jobFailed::query()->select('payload')->get(),
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

    /**
     * @param ResourcesQueryBuilder $builder
     * @param EditRequest $request
     * @return RedirectResponse
     */
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        DB::table('jobs')->truncate();
        return redirect()->route('admin.resources.index')
            ->with('success', __('Список RSS URL в очереди успешно очищен!'));
    }
}


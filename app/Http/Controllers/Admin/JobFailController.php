<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class JobFailController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        DB::table('failed_jobs')->truncate();
        return redirect()->route('admin.resources.index')
            ->with('success', __('Список RSS URL ошибок успешно очищен!'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class QueueWork extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        $this->startQueueOnes();

        return redirect()->route('admin.resources.index')
            ->with('success', __('Парсинг завершен!'));
    }

    /**
     * @return string
     */
    public function create(): string
    {
        return Artisan::call('queue:work');
    }

    /**
     * @return bool|string
     */
    public function startQueueOnes(): bool|string
    {
        return Artisan::call('queue:work --stop-when-empty');
    }

}



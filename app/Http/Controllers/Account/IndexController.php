<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request): Application|Factory|View
    {
        return view('account.index');
    }
}

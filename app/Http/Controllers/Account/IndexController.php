<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function __invoke(User $user): Application|Factory|View
    {
        return view('account.index', ['user' => Auth::user()]);
    }
}

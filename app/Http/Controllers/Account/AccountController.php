<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
    }

    /**
     * @return void
     */
    public function create()
    {
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
    }

    /**
     * @param $id
     * @return void
     */
    public function show($id)
    {
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id)
    {
    }

    /**
     * @param EditRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user = $user->fill($request->validated());
        if ($user->fill([
            'password' => Hash::make($request['password'])
        ])->save()) {
            return redirect()->route('account')
                ->with('success', __('messages.admin.users.update.success'));
        }
        return back()->with('error', __('messages.admin.users.update.error'));
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
    }
}

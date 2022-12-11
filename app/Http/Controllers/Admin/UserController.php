<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use App\Queries\UsersQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @param UsersQueryBuilder $builder
     * @return View|Factory|Application
     */
    public function index(UsersQueryBuilder $builder): View|Factory|Application
    {
        return view('admin.users.index', [
            'users' => $builder->getUsers(),
        ]);
    }


    /**
     * @param $id
     * @return void
     */
    public function show($id)
    {
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user): Application|Factory|View
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
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
            return redirect()->route('admin.users.index')
                ->with('success', __('messages.admin.users.update.success'));
        }
        return back()->with('error', __('messages.admin.users.update.error'));
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $delete = $user->delete();
            if ($delete === false) {
                return \response()->json('error', 400);
            }
            return \response()->json('ok');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return \response()->json('error', 400);
        }
    }
}

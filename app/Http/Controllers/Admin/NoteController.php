<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notes\CreateRequest;
use App\Http\Requests\Notes\EditRequest;
use App\Models\Note;
use App\Queries\NotesQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class NoteController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.notes.create');
    }

    /**
     * @param CreateRequest $request
     * @param NotesQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest     $request,
        NotesQueryBuilder $builder
    ): RedirectResponse
    {
        $categories = $builder->create(
            $request->validated()
        );

        if ($categories) {
            return redirect()->route('admin.resources.index')
                ->with('success', __('messages.admin.notes.store.success'));
        }
        return back()->with('error', __('messages.admin.notes.store.error'));
    }

    /**
     * @param Note $note
     * @return View|Factory|Application
     */
    public function show(Note $note): View|Factory|Application
    {
        return view('admin.notes.show', ['note' => $note]);
    }

    public function edit(Note $note): View|Factory|Application
    {
        return view('admin.notes.edit', [
            'note' => $note
        ]);
    }

    /**
     * @param EditRequest $request
     * @param Note $note
     * @param NotesQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        EditRequest       $request,
        Note              $note,
        NotesQueryBuilder $builder
    ): RedirectResponse
    {
        if ($builder->update($note, $request->validated())) {
            return redirect()->route('admin.resources.index')
                ->with('success', __('messages.admin.notes.update.success'));
        }
        return back()->with('error', __('messages.admin.notes.update.error'));
    }

    /**
     * @param Note $note
     * @return RedirectResponse
     */
    public function destroy(Note $note): RedirectResponse
    {
        if ($note->delete()) {
            return redirect()->route('admin.resources.index')
                ->with('success', __('messages.admin.notes.destroy.success'));
        }
        return back()->with('error', __('messages.admin.notes.destroy.error'));
    }
}

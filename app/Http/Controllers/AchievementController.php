<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AchievementController extends Controller
{
    /**
     * Create a new instance class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Achievement::class, 'achievement');
    }

    /**
     * Display index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('monitoring.achievement.index');
    }

    /**
     * Return datatable server side response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable()
    {
        $this->authorize('viewAny', Achievement::class);

        return DataTables::eloquent(Achievement::query())
            ->setTransformer(fn ($model) => AchievementResource::make($model)->resolve())
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('monitoring.achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Achievement\StoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $request->store();

        return redirect()->route('monitoring.achievement.index')->with([
            'alert' => [
                'type' => 'alert-success',
                'message' => trans('The :resource was created!', ['resource' => trans('menu.achievement')]),
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Achievement $achievement)
    {
        return view('monitoring.achievement.show', compact('achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Achievement $achievement)
    {
        return view('monitoring.achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Achievement\UpdateRequest  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Achievement $achievement)
    {
        $achievement = $request->update($achievement);

        return redirect()->route('monitoring.achievement.edit', $achievement)->with([
            'alert' => [
                'type' => 'alert-success',
                'message' => trans('The :resource was updated!', ['resource' => trans('menu.achievement')]),
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('monitoring.achievement.index')->with([
            'alert' => [
                'type' => 'alert-success',
                'message' => trans('The :resource was deleted!', ['resource' => trans('menu.achievement')]),
            ],
        ]);
    }

    /**
     * Remove the specified list of resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyMultiple(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->input('checkbox', []) as $id) {
                $achievement = Achievement::find($id, 'id');

                $this->authorize('delete', $achievement);

                $achievement->delete();
            }
        });

        return redirect()->route('monitoring.achievement.index')->with([
            'alert' => [
                'type' => 'alert-success',
                'message' => trans('The :resource was deleted!', ['resource' => trans('menu.achievement')]),
            ],
        ]);
    }
}

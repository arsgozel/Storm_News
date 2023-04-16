<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Highlights;
use Illuminate\Http\Request;

class HighlightsController extends Controller
{
    public function index()
    {
        $objs = Highlights::orderBy('sort_order')
            ->get();

        return view('admin.highlights.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function create()
    {
        $highlights = Highlights::orderBy('sort_order')
            ->get();

        return view('admin.highlights.create')
            ->with([
                'highlights' => $highlights,
            ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'name_ru' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Highlights::create([
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'name_ru' => $request->name_ru ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('admin.highlights.index')
            ->with([
                'success' => trans('app.highlights') . ' (' . $obj->getName() . ') ' . trans('app.added') . '!'
            ]);
    }


    public function edit($id)
    {
        $obj = Highlights::findOrFail($id);

        return view('admin.highlights.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'name_ru' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = Highlights::updateOrCreate([
            'id' => $id,
        ], [
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'name_ru' => $request->name_ru ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('admin.highlights.index')
            ->with([
                'success' => trans('app.highlights') . ' (' . $obj->getName() . ') ' . trans('app.updated') . '!'
            ]);
    }



    public function destroy($id)
    {
        $obj = Highlights::withCount('news')
            ->findOrFail($id);
        $objName = $obj->name_tm;
        if ($obj->news_count > 0) {
            return redirect()->back()
                ->with([
                    'error' => trans('app.error') . '!'
                ]);
        }
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.highlights') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}

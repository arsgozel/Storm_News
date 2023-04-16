<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $objs = Category::orderBy('sort_order')
            ->get();

        return view('admin.categories.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function create()
    {
        $category = Category::orderBy('sort_order')
            ->get();

        return view('admin.categories.create')
            ->with([
                'categories' => $category,
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

        $obj = Category::create([
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'name_ru' => $request->name_ru ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('admin.categories.index')
            ->with([
                'success' => trans('app.categories') . ' (' . $obj->getName() . ') ' . trans('app.added') . '!'
            ]);
    }


    public function edit($id)
    {
        $obj = Category::findOrFail($id);

        return view('admin.categories.edit')
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

        $obj = Category::updateOrCreate([
            'id' => $id,
        ], [
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'name_ru' => $request->name_ru ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('admin.categories.index')
            ->with([
                'success' => trans('app.categories') . ' (' . $obj->getName() . ') ' . trans('app.updated') . '!'
            ]);
    }



    public function destroy($id)
    {
        $obj = Category::withCount('news')
            ->findOrFail($id);
        $objName = $obj->name;
        if ($obj->news_count > 0) {
            return redirect()->back()
                ->with([
                    'error' => trans('app.error') . '!'
                ]);
        }
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.categories') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}

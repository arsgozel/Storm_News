<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
            'category' => 'nullable|integer|min:1|exists:categories,id',
            'highlights' => 'nullable|integer|min:1|exists:highlights,id',
        ]);

        $q = $request->q ?: null;
        $f_category = $request->category ?: null;
        $f_highlights = $request->highlights ?: null;


        $objs = News::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('name_tm', 'like', '%' . $q . '%');
                $query->orWhere('slug', 'like', '%' . $q . '%');
                $query->orWhere('viewed', 'like', '%' . $q . '%');
                $query->orWhere('created_at', 'like', '%' . $q . '%');
                $query->orWhere('updated_at', 'like', '%' . $q . '%');
            });
        })
            ->when($f_category, function ($query, $f_category) {
                $query->where('category_id', $f_category);
            })
            ->when($f_highlights, function ($query, $f_highlights) {
                $query->where('highlights_id', $f_highlights);
            })
            ->orderBy('id','desc')
            ->paginate(50)
            ->withQueryString();


        return view('admin.new.index')
            ->with([
                'objs' => $objs,
                'f_category' => $f_category,
                'f_highlights' => $f_highlights,
            ]);

    }
}

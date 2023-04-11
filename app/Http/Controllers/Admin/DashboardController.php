<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Highlights;
use App\Models\News;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $modals = [
            ['name' => 'news', 'total' => News::count()],
            ['name' => 'categories', 'total' => Category::count()],
            ['name' => 'highlights', 'total' => Highlights::count()],
            ['name' => 'contacts', 'total' => Contact::count()],
            ['name' => 'visitors', 'total' => Visitor::count()],
        ];

        $visible = News::where('is_visible', 1)
            ->count();

        $not_visible = News::where('is_visible', 0)
            ->count();

        return view('admin.dashboard.index')
            ->with([
                'modals' => $modals,
                'visible' => $visible,
                'not_visible' => $not_visible,
            ]);
    }
}

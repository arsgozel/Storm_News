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
            ['name' => 'news', 'icon' => 'newspaper', 'total' => News::count()],
            ['name' => 'categories', 'icon' => 'bookmark', 'total' => Category::count()],
            ['name' => 'highlights', 'icon' => 'award', 'total' => Highlights::count()],
            ['name' => 'contacts', 'icon' => 'person-lines-fill', 'total' => Contact::count()],
            ['name' => 'visitors', 'icon' => 'people', 'total' => Visitor::count()],
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

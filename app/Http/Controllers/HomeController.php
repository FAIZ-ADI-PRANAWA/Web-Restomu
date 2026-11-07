<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage with featured menus.
     */
    public function index()
    {
        // Get 3 featured menus
        $featuredMenus = Menu::where('is_featured', true)->take(3)->get();
        return view('welcome', compact('featuredMenus'));
    }

    /**
     * Show the menu page grouped by category.
     */
    public function menu()
    {
        // Get all categories with their menus
        $categories = Category::with('menus')->get();
        return view('menu', compact('categories'));
    }
}

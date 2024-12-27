<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Services\DigiflazzService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    protected $saldo;

    public function index()
    {

        $users = User::role('user')->count();
        $category = Category::count();
        $article = Article::count();
        return view('admin.index', ['users' => $users, 'article' => $article, 'category' => $category]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $categories, $featured, $popular;

    public function mount()
    {
        // Ambil 3 artikel terpopuler berdasarkan views, dan pastikan published_at tidak null
        $this->popular = Article::whereNotNull('published_at')
            ->orderBy('views', 'desc')
            ->take(3)
            ->get();

        // Ambil artikel pertama sebagai featured
        $this->featured = $this->popular->first();

        // Ambil semua kategori
        $this->categories = Category::all();
    }

    public function render()
    {
        // Ambil artikel dengan pagination (3 per halaman), hanya yang published_at tidak null
        $articles = Article::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(3);

        return view('livewire.home', [
            'articles' => $articles,
        ]);
    }
}

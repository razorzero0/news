<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category as CategoryModel;
use Livewire\Component;

class Category extends Component
{
    public $categoryName;
    public $articles;

    public function mount($name)
    {
        $this->categoryName = $name;

        // Temukan kategori berdasarkan nama dan ambil artikelnya
        $category = CategoryModel::where('name', $name)->first();

        if ($category) {
            $this->articles = Article::where('category_id', $category->id)
                ->whereNotNull('published_at') // Hanya artikel yang dipublikasikan
                ->get();
        } else {
            $this->articles = collect(); // Kosongkan jika kategori tidak ditemukan
        }
    }

    public function render()
    {
        return view('livewire.category');
    }
}

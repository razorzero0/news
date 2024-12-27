<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Search extends Component
{
    public $query, $articles;

    public function mount(string $query)
    {
        $this->query = $query;
    }

    public function render()
    {
        // Filter artikel yang memiliki published_at tidak null
        $this->articles = Article::whereNotNull('published_at')
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->query . '%')
                    ->orWhere('content', 'like', '%' . $this->query . '%');
            })
            ->get();

        return view('livewire.search');
    }
}

<?php

namespace App\Livewire\Home;

use App\Models\Article;
use Livewire\Component;

class Featured extends Component
{

    public $featured;
    public function mount()
    {
        $this->featured = Article::whereNotNull('published_at')
            ->orderBy('views', 'desc')
            ->first();
    }

    public function placeholder()
    {
        return view('livewire.home_partials.loading');
    }

    public function render()
    {
        return view('livewire.home_partials.featured');
    }
}

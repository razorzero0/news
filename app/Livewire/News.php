<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;

class News extends Component
{
    public $slug, $article, $otherPost, $comment;
    public $comments = [];

    public function mount(string $slug)
    {
        $this->slug = $slug;

        // Ambil artikel berdasarkan slug, pastikan hanya artikel dengan published_at tidak null
        $this->article = Article::where('slug', $this->slug)
            ->whereNotNull('published_at')
            ->first();

        if ($this->article) {
            // Increment views count
            $this->article->increment('views');
            // Ambil komentar terkait artikel
            $this->comments = $this->article->comments()->latest()->get();
        } else {
            // Jika artikel tidak ditemukan
            $this->comments = collect();
        }

        // Ambil 3 artikel terbaru, hanya yang dipublikasikan
        $this->otherPost = Article::latest()
            ->whereNotNull('published_at')
            ->take(3)
            ->get();
    }

    public function postComment()
    {
        // Validasi input komentar
        $this->validate([
            'comment' => 'required|string|max:500',
        ]);

        // Simpan komentar ke database
        if ($this->article) {
            Comment::create([
                'article_id' => $this->article->id,
                'user_id' => auth()->id(), // Ambil ID user yang sedang login
                'comment' => $this->comment,
            ]);

            // Reset input dan perbarui komentar
            $this->comment = '';
            $this->comments = $this->article->comments()->latest()->get();
            $this->dispatch('alert', ['type' => 'success', 'message' => '✅ Comment Added Successfully!']);
        }
    }

    public function render()
    {
        return view('livewire.news');
    }
}

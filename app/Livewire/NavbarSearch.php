<?php

namespace App\Livewire;

use Livewire\Component;

class NavbarSearch extends Component
{
    public $query;

    public function navigateToSearch()
    {
        if (!empty($this->query)) {
            // dd($this->query);
            // return redirect()->route('search', ['query' => $this->query]);
            return $this->redirect(route('search',  ['query' => $this->query]), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.layouts.navbar-search');
    }
}

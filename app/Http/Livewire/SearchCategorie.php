<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories;

class SearchCategorie extends Component
{
    public string $search = '';
    public function render()
    {
        $words = '%' . $this->search . '%';
        return view('livewire.search-categorie', [
            'categorie' =>(strlen($this->search)> 2)
            ? Categories::where('title', 'like', $words)->get()
            : Categories::All()
        ]);
    }
}

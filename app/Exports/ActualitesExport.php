<?php

namespace App\Exports;

use App\Models\Actualites;
use Maatwebsite\Excel\Concerns\FromCollection;

class ActualitesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Actualites::get(['id', 'titre', 'sous_titre']);
    }

    public function headings() :array
    {
        return ['ID', 'Nom', 'Sous-titre'];
    }
}

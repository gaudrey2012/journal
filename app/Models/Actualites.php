<?php

namespace App\Models;

use App\Models\User;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actualites extends Model
{
    use HasFactory;
    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }
    public function dateFormatted(){
        return date_format($this->created_at, 'd-M-y');
    }
    protected $fillable = ['titre','description', 'categorie_id'];
}

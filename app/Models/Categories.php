<?php

namespace App\Models;

use App\Models\User;
use App\Models\Actualites;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    public function actualites()
    {
        return $this->hasMany(Actualites::class);
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }
    public function dateFormatted(){
        return date_format($this->created_at, 'd-M-y');
    }
    protected $fillable = ['title','subtitle'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'description', 'quantity'];

    public function getStatusTextAttribute() {
        return match ($this->status) {
            1 => 'Baixa',
            2 => 'Média',
            3 => 'Urgente',
            default => 'Baixa'
        };
    }
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            1 => 'success',
            2 => 'warning',
            3 => 'danger',
            default => 'success'
        };
    }
	public function categories() {
		return $this->belongsToMany(Category::class,'item_category');
	}


}

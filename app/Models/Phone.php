<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

	protected $fillable = ['number', 'label'];

	public function addresses() {
		return $this->belongsToMany(Address::class,'phone_address');
	}
}

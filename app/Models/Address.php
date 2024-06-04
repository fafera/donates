<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'label', 'street', 'number', 'complement', 'neighborhood', 'city',
            'uf', 'cep'
        ];

    public function phones(): BelongsToMany
    {
        return $this->belongsToMany(Phone::class, 'phone_address');
    }

    public function getFullAddressAttribute(): string
    {
        $fullAddress = "$this->street, $this->number";
        if ($this->complement !== null) {
            $fullAddress .= " - $this->complement";
        }
        $fullAddress .= ", $this->neighborhood, $this->city - $this->uf, CEP: $this->cep";

        return $fullAddress;
    }

    public function getGoogleMapsLinkAttribute()
    {
        $googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=';

        return $googleMapsUrl.urlencode($this->fullAddress);
    }

}

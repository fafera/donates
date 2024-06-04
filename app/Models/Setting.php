<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $fillable
        = [
            'key', 'label', 'type', 'value', 'attributes', 'tag'
        ];
    protected $casts = ['attributes' => 'array'];

    public function getSettingValue(string $key): string
    {
        return $this::select('value')->where('key', $key)->first()->value ?? '';
    }

    public function getSetting(string $key): ?Setting
    {
        return $this::where('key', $key)->first() ?? null;
    }

    public function getAllSettings(): array
    {
        $data = $this::select('key', 'value')->get()->all();

        return $this->flatArrayFromCollection($data);
    }

    public function getSettingByTag(string $tag): array
    {
        $data = self::select('key', 'value')->where('tag', $tag)->get()->all();

        return $this->flatArrayFromCollection($data);
    }

    protected function flatArrayFromCollection(array $data): array
    {
        $settings = [];
        if ( ! is_iterable($data)) {
            return $settings;
        }
        foreach ($data as $register) {
            $settings[$register->key] = $register->value;
        }

        return $settings;
    }
}

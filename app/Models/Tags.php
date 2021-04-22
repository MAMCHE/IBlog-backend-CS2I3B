<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function rules()
    {
        return [
            'name' => ['required','unique', 'string', 'max:100'],
            'description' => ['required'],
        ];
    }

    public function problem()
    {
        return $this->hasMany(Problems::class);
    }


}

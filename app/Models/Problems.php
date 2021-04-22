<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problems extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'tags',
    ];

    public function rules()
    {
        return [
            'title' => ['required','unique', 'string', 'max:100'],
            'body' => ['required'],
            'tags' => ['required'],
        ];
    }

    public function tagList($collection)
    {
        foreach ($collection as $item)
        {
            $newArray[] = $item ['name'];
        }

        return implode (',', $newArray);
    }

    public function userList($collection)
    {
        foreach ($collection as $item)
        {
            $newArray[] = $item ['name'];
        }

        return implode (',', $newArray);
    }


    public function tags()
    {
        return $this->belongsToMany(self::class, 'tags', 'id','id')
            ->withTimestamps()
            ->as('problems');
    }

    public function users()
    {
        return $this->belongsToMany(self::class, 'users', 'id','id')
            ->withTimestamps()
            ->as('problems');
    }
}

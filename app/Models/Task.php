<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Разрешаем массовое заполнение только этих полей модели.
    protected $fillable = [
        'title',
        'description',
        'status',
    ];
}

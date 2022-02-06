<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description','status'];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\SettingsFactory::new();
    }
}

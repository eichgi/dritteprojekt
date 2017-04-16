<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    protected $fillable = ['name', 'type', 'has_cost', 'language', 'link', 'description', 'tags'];

    use SoftDeletes;

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}

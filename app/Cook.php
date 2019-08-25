<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    protected $fillable = ['user_id', 'name', 'method', 'ingredient1', 'ingredient2'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function voted()
    {
        return $this->belongsToMany(User::class, 'cook_vote', 'cook_id', 'user_id');
    }
}

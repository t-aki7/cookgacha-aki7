<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function cooks() //ユーザが登録したCookの取得
    {
        return $this->hasMany(Cook::class);
    }
    
    public function votes() //ユーザが投票したCookの取得 中間テーブルへのアクセス
    {
        return $this->belongsToMany(Cook::class, 'cook_vote', 'user_id', 'cook_id')->withTimestamps();
    }
    
    public function vote_status($cookId) //投票の状態の確認
    {
        return $this->votes()->where('cook_id', $cookId)->exists();
    }
    
    public function cooking($cookId) //投票
    {
        //投票状態の確認
        $exists = $this->vote_status($cookId);
        
        if ($exists) {
            //True
            return false;
        }
        else {
            $this->votes()->attach($cookId);
            return true;
        }
    }
    
    public function uncooking($cookId) //票の取り下げ
    {
        $exists = $this->vote_status($cookId);
        
        if ($exists) {
            $this->votes()->detach($cookId);
            return true;
        }
        else {
            return false;
        }
    }
}

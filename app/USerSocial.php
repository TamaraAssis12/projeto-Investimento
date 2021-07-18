<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class USerSocial extends Model
{
    //
    use SoftDeletes;
    use Notifiable;

    public      $timestamps = true;
    protected   $table      = 'users';
    protected   $fillable   = ['user_id', 'social_network', 'social_id', 'social_email', 'social_avatar', 'user_id'];
    protected   $hidden     = ['password', 'remember_token'];
     
}

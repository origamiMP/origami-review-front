<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
  protected $dates = ['expires_at'];
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'username', 'token_type', 'access_token', 'refresh_token', 'expires_at'
  ];
}

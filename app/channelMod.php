<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class channelMod extends Model
{
    protected $fillable=['channelDesc','active','remark'];
    protected $primaryKey='channelId';
}

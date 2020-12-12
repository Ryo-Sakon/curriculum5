<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'title' => 'required',
        'space' => 'required',
        'deadline' => 'date',
        'priority' => 'digits_between:1,5',
        'user_id' => 'integer',
    );
}

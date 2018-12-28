<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BikeMeeting extends Model
{
    /**
     * 报名费
     */
    const APPLY_FEE_NUMBER = 10000;

    /**
     * Related User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

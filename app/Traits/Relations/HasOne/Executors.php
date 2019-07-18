<?php

namespace App\Traits\Relations\HasOne;

use App\Models\User;

trait Executors{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function executor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'executor_id');
    }
}

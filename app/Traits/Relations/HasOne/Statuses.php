<?php

namespace App\Traits\Relations\HasOne;

use App\Models\Status;

trait Statuses{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}

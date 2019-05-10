<?php

namespace App\Traits\Methods;

trait ToggleActive
{
    public function active()
    {
        $this->is_active = 1;
        $this->save();
    }

    public function notActive()
    {
        $this->is_active = 0;
        $this->save();
    }

    public function toggleActive( $id)
    {
        $toggle = self::find($id);
        if ($toggle->is_active === 0)
        {
            return $toggle->active();
        }
        return $toggle->notActive();
    }

    public function getActivePoints() :array
    {
        $active = self::all()->filter(function ($item) {
            return $item['is_active'] === 1;
        });

//        return self::all()->where('is_active', '=', 1)
//            ->flatten()->all();
        return $active->flatten()->all();
    }
}

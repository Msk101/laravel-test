<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function workshops()
    {
        return $this->hasMany(Workshop::class, 'event_id', 'id');

    }

    protected function getFutureEvents()
    {
        return $this->with('workshops')
                ->whereHas('workshops', function ($query) {
                    $query->where('start', '>', Carbon::now());
                })
                ->get();
    }
}

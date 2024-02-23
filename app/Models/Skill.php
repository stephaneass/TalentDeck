<?php

namespace App\Models;

use App\Utils\Traits\HasState;
use App\Utils\Traits\StateLabel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory, HasState;

    protected $guarded = [];

    public function scopeList($query, $user_id = null, $search='')
    {
        return $query->when(!blank($user_id), function($q) use ($user_id){
                        $q->where('user_id', $user_id);
                    })
                    ->when(!blank($search), function($q) use($search){
                        $q->where(function($q)use($search){
                            $q->where('name', 'like', "%$search%")
                            ;
                        });
                    })
                ;
    } 

    public function markAsCreated()
    {
        $this->state = StateLabel::$CREATED;
        $this->save();
    }

    public function markAsSuspended()
    {
        $this->state = StateLabel::$SUSPENDED;
        $this->save();
    }
}

<?php

namespace App\Models;

use App\Utils\Traits\HasState;
use App\Utils\Traits\StateLabel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory, HasState;

    protected $guarded = [];

    public function scopeList($query, $search='')
    {
        return $query->when(!blank($search), function($q) use($search){
                        $q->where(function($q)use($search){
                            $q->where('degree', 'like', "%$search%")
                            ->orWhere('educations.institution', 'like', "%$search%")
                            ->orWhere('field_of_study', 'like', "%$search%")
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

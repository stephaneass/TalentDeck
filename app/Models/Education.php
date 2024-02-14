<?php

namespace App\Models;

use App\Utils\Traits\HasState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory, HasState;

    protected $guarded = [];
    protected $table = 'educations';

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
}

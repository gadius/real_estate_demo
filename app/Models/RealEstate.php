<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealEstate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'real_state_type',
        'street',
        'external_number',
        'internal_number',
        'neighborhood',
        'city',
        'country',
        'rooms',
        'bathrooms',
        'comments',
    ];

    /* Mutators */

    /*        
        Creating mutators to handle date format to use on all the app, 
        if somethings need to be changed we replace the format on RealEstate.php only instead of all the API calls following DRY principle 
    */
    public function getCreatedAtTextAttribute()
    {
        return $this->created_at !== null ? $this->created_at->format('d/m/Y') : null;
    }
    public function getUpdatedAtTextAttribute()
    {
        return $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null;
    }
    public function getDeletedAtTextAttribute()
    {
        return $this->deleted_at !== null ? $this->deleted_at->format('d/m/Y') : null;
    }


}

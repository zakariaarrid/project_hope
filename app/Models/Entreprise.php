<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $guarded = [];  

    protected $table = 'entreprise';

    const PAGINATION_COUNT = 10;

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

}

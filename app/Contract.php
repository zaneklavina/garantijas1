<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $primaryKey = 'id';

    public function contract()
    {
        return $this->belongsTo('Project', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $primaryKey = 'project_id';



    public function contract()
    {
        return $this->belongsTo('Project', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function service_data($id)
    {
    	return Service::find($id);
    }
}

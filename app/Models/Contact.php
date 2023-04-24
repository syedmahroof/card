<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    /**
      * The attributes that are not able to mass assign.
      *
      * @var array<int, string>
      */
     protected $guarded = [];
 
    public function selfCreate($data)
    {
        try {
            $self = self::create($data);
            $return['result'] = true;
            $return['message'] = 'Successfully Created';
            $return['id'] = $self->id;
        } catch (\Exception $e) {
            $return['result'] = false;
            $return['message'] = $e->getMessage();
        }

        return $return;
    }
 
}

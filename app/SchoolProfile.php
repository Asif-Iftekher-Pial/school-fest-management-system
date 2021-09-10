<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
        protected $table = 'school_profiles';

        /**
        * The database primary key value.
        *
        * @var string
        */
        protected $primaryKey = 'id';

    	    /**
         * Attributes that should be mass-assignable.
         *
         * @var array
         */
       	protected $fillable = [
       	   'school_phone', 'coordinator', 'mobile_number', 'images', 'school_address', 'user_id'
       	];

       	public function user()
        {
            return $this->hasOne(User::class);
        }
}

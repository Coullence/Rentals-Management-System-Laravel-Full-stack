<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class Image extends Model
{

    use HasRoleAndPermission;
    use Notifiable;
    use SoftDeletes;
    const default = 1;

       

    
       protected $fillable = [
     
            'blog_id',
            'fileName',
            'created_at',
            'updated_at',




    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Images';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',

    ];

  

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
       


            'id'                    	 => 'integer',
            'blog_id'                     => 'string',
            'fileName'                     => 'string',
            

    ];

    /**
 * A files has an order.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */

public function image()
{
    return $this->belongsTo(Blog::class, 'blog_id', 'id');
}
}
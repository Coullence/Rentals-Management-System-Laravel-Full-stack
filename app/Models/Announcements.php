<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class Announcements extends Model
{

    use HasRoleAndPermission;
    use Notifiable;
    use SoftDeletes;
        const default = 1;

    
       protected $fillable = [
  
            'category',
            'title',
            'body',
            'postedBy'


    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'announcements';

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
        'deleted_at',
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

            'id'                        => 'integer',
            'category'                  => 'string',
            'title'                     => 'string',
            'body'                      => 'string',
            'postedBy'                  => 'string',

    ];

    /**
 * A order has a user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */

}

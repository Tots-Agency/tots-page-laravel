<?php

namespace Tots\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Tots\Language\Models\TotsLanguage;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $title Description for variable
 * @property mixed $short_title Description for variable
 * @property mixed $slug Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="short_title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="slug",
 *  type="string",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class TotsPage extends Model
{
    protected $table = 'tots_page';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function language()
    {
        return $this->belongsTo(TotsLanguage::class, 'language_id');
    }
}
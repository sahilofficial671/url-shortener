<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;
use App\Traits\HasUrl;

class Url extends Model
{
    use HasFactory, HasUrl;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'protocol',
        'domain',
        'path',
        'query',
        'max_hits',
        'hits',
        'alias',
        'created_by',
        'status'
    ];

    /**
     *  This will validate and submit new url for aliasing
     *
     *  @param \Illuminate\Database\Eloquent\Builder    $builder
     *  @param  string                                  $alias
     *  @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByAlias(Builder $builder, String $alias)
    {
        return  $builder->where('alias', $alias);
    }

    /**
     * Get the user that owns the Url
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

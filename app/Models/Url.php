<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;
use App\Traits\HasRedirections;

class Url extends Model
{
    use HasFactory, HasRedirections;

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
     *  @param Illuminate\Database\Eloquent\Builder $builder
     *  @param string $alias
     *  @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeByAlias(Builder $builder, String $alias)
    {
        return  $builder->where('alias', $alias);
    }

    /**
     *  Return Full URL.
     *  @return string
     */
    public function getFullUrl()
    {
        if(!$this->hasQuery()){
            return sprintf('%s://%s%s', $this->protocol, $this->domain, $this->path);
        }

        return sprintf('%s://%s%s?%s', $this->protocol, $this->domain, $this->path, $this->query);
    }

    /**
     *  Return Aliased URL.
     *  @return string
     */
    public function getAliasedUrl()
    {
        return sprintf('%s/u/%s', config('app.url'), $this->alias);
    }

    /**
     *  Checks if query string.
     *  @return boolean
     */
    public function hasQuery()
    {
        return isset($this->query);
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

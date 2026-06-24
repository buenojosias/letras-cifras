<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mass extends Model
{
    protected $fillable = [
        'group_id',
        'epoch_id',
        'place',
        'datetime',
        'liturgical_year',
        'theme',
        'readings_text',
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function epoch()
    {
        return $this->belongsTo(Epoch::class);
    }

    public function items()
    {
        return $this->hasMany(MassItem::class)
            ->orderBy('position');
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class)
            ->using(MassSong::class)
            ->withPivot(['id', 'moment_id', 'tone', 'position'])
            ->withTimestamps()
            ->orderBy('pivot_position');
    }

    public function embedding()
    {
        return $this->hasOne(MassEmbedding::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    protected $fillable = ['title', 'start_date', 'end_date'];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    protected $appends = ['status'];

    public function getStatusAttribute(): string 
    {
        $now = now();
        if ($now < $this->start_date) {
          return 'Não iniciada';
        }
        if ($now > $this->end_date) {
          return 'Encerrada';
        }

        return 'Em andamento';
    }

    public function isOpen(): bool 
    {
        return now()->greaterThanOrEqualTo($this->start_date) && 
            now()->lessThanOrEqualTo($this->end_date);
    }


    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
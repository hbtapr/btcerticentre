<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Theme extends Model
{
    use HasAdvancedFilter, SoftDeletes;

    public $table = 'themes';

    protected $orderable = [
        'id',
        'micro_theme',
        'macro_theme',
    ];

    protected $filterable = [
        'id',
        'micro_theme',
        'macro_theme',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'micro_theme',
        'macro_theme',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

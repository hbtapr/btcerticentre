<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Question extends Model
{
    use HasAdvancedFilter, SoftDeletes;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'question',
        'question_type',
        'difficulty',
    ];

    protected $filterable = [
        'id',
        'question',
        'question_type',
        'difficulty',
        'theme.micro_theme',
    ];

    protected $fillable = [
        'question',
        'question_type',
        'difficulty',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function theme()
    {
        return $this->belongsToMany(Theme::class);
    }
}

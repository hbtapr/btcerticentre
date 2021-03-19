<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Alternative extends Model
{
    use HasAdvancedFilter, SoftDeletes;

    public $table = 'alternatives';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'alt_1',
        'alt_2',
        'alt_3',
        'alt_4',
        'alt_5',
        'right_alternative',
        'type.question_type',
        'difficulty.difficulty',
    ];

    protected $fillable = [
        'alt_1',
        'alt_2',
        'alt_3',
        'alt_4',
        'alt_5',
        'right_alternative',
        'type_id',
        'difficulty_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'questions.question',
        'theme.micro_theme',
        'alt_1',
        'alt_2',
        'alt_3',
        'alt_4',
        'alt_5',
        'right_alternative',
        'type.question_type',
        'difficulty.difficulty',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function theme()
    {
        return $this->belongsToMany(Theme::class);
    }

    public function type()
    {
        return $this->belongsTo(Question::class);
    }

    public function difficulty()
    {
        return $this->belongsTo(Question::class);
    }
}

<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Attempt extends Model
{
    use HasAdvancedFilter, SoftDeletes;

    public $table = 'attempts';

    protected $orderable = [
        'id',
        'first_attempt',
        'second_attempt',
        'certificates.area',
    ];

    protected $filterable = [
        'id',
        'first_attempt',
        'second_attempt',
        'certificates.area',
    ];

    protected $dates = [
        'first_attempt',
        'second_attempt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_attempt',
        'second_attempt',
        'certificates_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getFirstAttemptAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setFirstAttemptAttribute($value)
    {
        $this->attributes['first_attempt'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getSecondAttemptAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setSecondAttemptAttribute($value)
    {
        $this->attributes['second_attempt'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function certificates()
    {
        return $this->belongsTo(Certificate::class);
    }
}

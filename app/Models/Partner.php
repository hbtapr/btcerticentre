<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Partner extends Model
{
    use HasAdvancedFilter, SoftDeletes;

    public $table = 'partners';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'partner_name',
        'partner_address',
        'partner_email',
        'business_number',
    ];

    protected $filterable = [
        'id',
        'partner_name',
        'partner_address',
        'partner_email',
        'business_number',
    ];

    protected $fillable = [
        'partner_name',
        'partner_address',
        'partner_email',
        'business_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

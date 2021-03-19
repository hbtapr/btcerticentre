<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Client extends Model
{
    use HasAdvancedFilter, SoftDeletes;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'email',
        'phone',
        'social_number',
        'client_name',
        'products',
    ];

    protected $filterable = [
        'id',
        'email',
        'phone',
        'social_number',
        'client_name',
        'products',
    ];

    protected $fillable = [
        'email',
        'phone',
        'social_number',
        'client_name',
        'products',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Demo extends Model
{
    use HasAdvancedFilter, SoftDeletes;

    public $table = 'demos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'question',
        'alt_right',
        'partner_demo.partner_name',
    ];

    protected $filterable = [
        'id',
        'question',
        'alt_right',
        'partner_demo.partner_name',
    ];

    protected $fillable = [
        'question',
        'alt_right',
        'partner_demo_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function partnerDemo()
    {
        return $this->belongsTo(Partner::class);
    }
}

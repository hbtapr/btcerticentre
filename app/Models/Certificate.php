<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use \DateTimeInterface;

class Certificate extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, HasMediaTrait;

    public $table = 'certificates';

    protected $appends = [
        'cert_pdf',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'area',
        'minnimum_approval_rate',
    ];

    protected $filterable = [
        'id',
        'area',
        'minnimum_approval_rate',
    ];

    protected $fillable = [
        'area',
        'minnimum_approval_rate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getCertPdfAttribute()
    {
        return $this->getMedia('certificate_cert_pdf')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }
}

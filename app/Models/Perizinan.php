<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Perizinan extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'perizinans';

    public $orderable = [
        'id',
        'jenis_izin',
        'instansi_penerbit',
        'nomor_izin',
        'masa_berlaku',
    ];

    public $filterable = [
        'id',
        'jenis_izin',
        'instansi_penerbit',
        'nomor_izin',
        'masa_berlaku',
    ];

    protected $appends = [
        'lampiran_file',
    ];

    protected $dates = [
        'masa_berlaku',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'jenis_izin',
        'instansi_penerbit',
        'nomor_izin',
        'masa_berlaku',
    ];

    public function getMasaBerlakuAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setMasaBerlakuAttribute($value)
    {
        $this->attributes['masa_berlaku'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLampiranFileAttribute()
    {
        return $this->getMedia('perizinan_lampiran_file')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

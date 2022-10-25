<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
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
    use Tenantable;
    use InteractsWithMedia;
    use Auditable;

    public $table = 'perizinans';

    public $orderable = [
        'id',
        'nama_izin',
        'instansi_penerbit',
        'nomor_izin',
        'tanggal_dikeluarkan',
        'berlaku_sampai',
    ];

    public $filterable = [
        'id',
        'nama_izin',
        'instansi_penerbit',
        'nomor_izin',
        'tanggal_dikeluarkan',
        'berlaku_sampai',
    ];

    protected $appends = [
        'lampiran_file',
    ];

    protected $dates = [
        'tanggal_dikeluarkan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_izin',
        'instansi_penerbit',
        'nomor_izin',
        'tanggal_dikeluarkan',
        'berlaku_sampai',
    ];

    public function getTanggalDikeluarkanAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setTanggalDikeluarkanAttribute($value)
    {
        $this->attributes['tanggal_dikeluarkan'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLampiranFileAttribute()
    {
        return $this->getMedia('perizinan_lampiran_file')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

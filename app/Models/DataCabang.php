<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataCabang extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
    use Auditable;

    public $table = 'data_cabangs';

    public $orderable = [
        'id',
        'district.district_name',
        'district.id_district',
        'nama_ketua',
        'kontak_hp_wa',
        'jumlah_anggota',
    ];

    public $filterable = [
        'id',
        'district.district_name',
        'district.id_district',
        'nama_ketua',
        'kontak_hp_wa',
        'jumlah_anggota',
    ];

    protected $appends = [
        'lampiran',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'district_id',
        'nama_ketua',
        'kontak_hp_wa',
        'jumlah_anggota',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function getLampiranAttribute()
    {
        return $this->getMedia('data_cabang_lampiran')->map(function ($item) {
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

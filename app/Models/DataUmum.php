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

class DataUmum extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
    use Auditable;

    public $table = 'data_umums';

    public $orderable = [
        'id',
        'nama_lembaga',
        'ketua.name',
        'ketua.periode',
        'sekretariat_wilayah',
        'website',
        'email',
        'telp',
        'whats_app',
        'lingkup_kegiatan',
        'perizinan.nama_izin',
        'jumlah_anggota',
        'province.province_name',
        'province.id_province',
    ];

    public $filterable = [
        'id',
        'nama_lembaga',
        'ketua.name',
        'ketua.periode',
        'sekretariat_wilayah',
        'website',
        'email',
        'telp',
        'whats_app',
        'lingkup_kegiatan',
        'perizinan.nama_izin',
        'jumlah_anggota',
        'province.province_name',
        'province.id_province',
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
        'nama_lembaga',
        'ketua_id',
        'sekretariat_wilayah',
        'website',
        'email',
        'telp',
        'whats_app',
        'lingkup_kegiatan',
        'perizinan_id',
        'jumlah_anggota',
        'province_id',
    ];

    public function ketua()
    {
        return $this->belongsTo(Ketua::class);
    }

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function getLampiranAttribute()
    {
        return $this->getMedia('data_umum_lampiran')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
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

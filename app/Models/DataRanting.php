<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataRanting extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'data_rantings';

    public $orderable = [
        'id',
        'village.village_name',
        'village.id_village',
        'nama_ketua',
        'kontak_hp_wa',
        'jumlah_anggota',
    ];

    public $filterable = [
        'id',
        'village.village_name',
        'village.id_village',
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
        'village_id',
        'nama_ketua',
        'kontak_hp_wa',
        'jumlah_anggota',
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function getLampiranAttribute()
    {
        return $this->getMedia('data_ranting_lampiran')->map(function ($item) {
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

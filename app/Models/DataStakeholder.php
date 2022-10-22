<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataStakeholder extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public const LAMA_KERJASAMA_SELECT = [
        '1 Tahun' => '1 Tahun',
        '2 Tahun' => '2 Tahun',
        '3 Tahun' => '3 Tahun',
        '4 Tahun' => '4 Tahun',
        '5 Tahun' => '5 Tahun',
    ];

    public $table = 'data_stakeholders';

    public $orderable = [
        'id',
        'nama_stakeholder',
        'daerah.nama_daerah',
        'kontak_di_lembaga.name',
        'kontak_di_stakeholder.name',
        'jenis_kerjasama.nama_jenis',
        'jangkauan_kerjasama',
        'lama_kerjasama',
    ];

    public $filterable = [
        'id',
        'nama_stakeholder',
        'daerah.nama_daerah',
        'kontak_di_lembaga.name',
        'kontak_di_stakeholder.name',
        'jenis_kerjasama.nama_jenis',
        'jangkauan_kerjasama',
        'lama_kerjasama',
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
        'nama_stakeholder',
        'daerah_id',
        'kontak_di_lembaga_id',
        'kontak_di_stakeholder_id',
        'jenis_kerjasama_id',
        'jangkauan_kerjasama',
        'lama_kerjasama',
    ];

    public function daerah()
    {
        return $this->belongsTo(DataDaerah::class);
    }

    public function kontakDiLembaga()
    {
        return $this->belongsTo(User::class);
    }

    public function kontakDiStakeholder()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisKerjasama()
    {
        return $this->belongsTo(JenisKerjasama::class);
    }

    public function getLamaKerjasamaLabelAttribute($value)
    {
        return static::LAMA_KERJASAMA_SELECT[$this->lama_kerjasama] ?? null;
    }

    public function getLampiranAttribute()
    {
        return $this->getMedia('data_stakeholder_lampiran')->map(function ($item) {
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
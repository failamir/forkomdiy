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

    public $table = 'data_stakeholders';

    public $orderable = [
        'id',
        'nama_stakeholder',
        'kontak_di_lembaga',
        'kontak_di_stakeholder',
        'jenis_kerjasama',
        'jangkauan_kerjasama',
        'lama_kerjasama',
    ];

    public $filterable = [
        'id',
        'nama_stakeholder',
        'kontak_di_lembaga',
        'kontak_di_stakeholder',
        'jenis_kerjasama',
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
        'kontak_di_lembaga',
        'kontak_di_stakeholder',
        'jenis_kerjasama',
        'jangkauan_kerjasama',
        'lama_kerjasama',
    ];

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

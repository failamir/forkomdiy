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

class DataStakeholder extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
    use Auditable;

    public $table = 'data_stakeholders';

    public $orderable = [
        'id',
        'jenis_kerjasama',
        'frekuensi_kerjasama',
        'mulai_kerjasama',
        'nama_lembaga_kerjasama',
        'nama_stakeholder',
        'no_hp_wa_stakeholder',
        'kontak_di_lembaga',
        'no_hp_wa_lembaga',
        'jangkauan_kerjasama',
    ];

    public $filterable = [
        'id',
        'jenis_kerjasama',
        'frekuensi_kerjasama',
        'mulai_kerjasama',
        'nama_lembaga_kerjasama',
        'nama_stakeholder',
        'no_hp_wa_stakeholder',
        'kontak_di_lembaga',
        'no_hp_wa_lembaga',
        'jangkauan_kerjasama',
    ];

    protected $appends = [
        'lampiran',
    ];

    protected $dates = [
        'mulai_kerjasama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'jenis_kerjasama',
        'frekuensi_kerjasama',
        'mulai_kerjasama',
        'nama_lembaga_kerjasama',
        'nama_stakeholder',
        'no_hp_wa_stakeholder',
        'kontak_di_lembaga',
        'no_hp_wa_lembaga',
        'jangkauan_kerjasama',
    ];

    public function getMulaiKerjasamaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setMulaiKerjasamaAttribute($value)
    {
        $this->attributes['mulai_kerjasama'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLampiranAttribute()
    {
        return $this->getMedia('data_stakeholder_lampiran')->map(function ($item) {
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

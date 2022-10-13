<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataKhusu extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Auditable;

    public $table = 'data_khusus';

    public $orderable = [
        'id',
        'nama_daerah',
        'data_daerah.nama_daerah',
        'jumlah_anggota_daerah',
        'nama_cabang',
        'jumlah_anggota_cabang',
        'data_cabang.nama_cabang',
        'nama_sub_wilayah',
        'jumlah_anggota_sub_wilayah',
        'data_sub_wilayah_lain.nama_wilayah',
    ];

    public $filterable = [
        'id',
        'nama_daerah',
        'data_daerah.nama_daerah',
        'jumlah_anggota_daerah',
        'nama_cabang',
        'jumlah_anggota_cabang',
        'data_cabang.nama_cabang',
        'nama_sub_wilayah',
        'jumlah_anggota_sub_wilayah',
        'data_sub_wilayah_lain.nama_wilayah',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_daerah',
        'data_daerah_id',
        'jumlah_anggota_daerah',
        'nama_cabang',
        'jumlah_anggota_cabang',
        'data_cabang_id',
        'nama_sub_wilayah',
        'jumlah_anggota_sub_wilayah',
        'data_sub_wilayah_lain_id',
    ];

    public function dataDaerah()
    {
        return $this->belongsTo(DataDaerah::class);
    }

    public function dataCabang()
    {
        return $this->belongsTo(DataCabang::class);
    }

    public function dataSubWilayahLain()
    {
        return $this->belongsTo(DataWilayah::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

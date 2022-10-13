<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataCabang extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Auditable;

    public $table = 'data_cabangs';

    public $orderable = [
        'id',
        'nama_cabang',
        'daerah.nama_daerah',
    ];

    public $filterable = [
        'id',
        'nama_cabang',
        'daerah.nama_daerah',
    ];

    protected $fillable = [
        'nama_cabang',
        'daerah_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function daerah()
    {
        return $this->belongsTo(DataDaerah::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

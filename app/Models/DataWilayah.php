<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataWilayah extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'data_wilayahs';

    public $orderable = [
        'id',
        'nama_wilayah',
        'daerah.nama_daerah',
    ];

    public $filterable = [
        'id',
        'nama_wilayah',
        'daerah.nama_daerah',
    ];

    protected $fillable = [
        'nama_wilayah',
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

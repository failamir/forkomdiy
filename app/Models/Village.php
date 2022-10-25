<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Village extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use Auditable;

    public $table = 'villages';

    public $orderable = [
        'id',
        'id_district',
        'id_village',
        'village_name',
    ];

    public $filterable = [
        'id',
        'id_district',
        'id_village',
        'village_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_district',
        'id_village',
        'village_name',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

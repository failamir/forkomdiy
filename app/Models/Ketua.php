<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ketua extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use Auditable;

    public $table = 'ketuas';

    public $orderable = [
        'id',
        'ketua.contact_first_name',
        'name',
        'periode',
    ];

    public $filterable = [
        'id',
        'ketua.contact_first_name',
        'name',
        'periode',
    ];

    protected $fillable = [
        'ketua_id',
        'name',
        'periode',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function ketua()
    {
        return $this->belongsTo(ContactContact::class);
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

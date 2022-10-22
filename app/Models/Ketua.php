<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ketua extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'ketuas';

    public $orderable = [
        'id',
        'ketua.contact_first_name',
        'periode',
    ];

    public $filterable = [
        'id',
        'ketua.contact_first_name',
        'periode',
    ];

    protected $fillable = [
        'ketua_id',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

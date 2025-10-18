<?php

namespace Modules\Hewan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Hewan extends Model
{
    use HasFactory;
    protected $table = 'hewan';
    protected $fillable = ['id_customer','nama','tanggal_lagir', 'jenis_hewan'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}

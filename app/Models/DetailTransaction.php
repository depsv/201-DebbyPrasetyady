<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'detail_transactions';
    protected $fillable = ['transaction_id', 'service_id', 'qty', 'discount', 'total'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Quotation2 extends Model
{
  protected $table = 'quotations';
  protected $primaryKey = 'id';
  protected $fillable = ['customer_id', 'user_id', 'remark', 'vat_percent', 'vat', 'subtotal',  'net_total'];

  public function details()
  {
    return $this->hasMany(QuotationDetail::class, 'quotation_id', 'id');
  }
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }
  public function customers()
  {
    return $this->belongsTo('App\CustomerModel', 'customer_id');
  }
}

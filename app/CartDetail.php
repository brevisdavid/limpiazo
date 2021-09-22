<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class CartDetail extends Model
{
    // un producto tiene muchos detalles de compras
  public function product()
  {
    return $this->belongsTo(Product::class);
  }  
}

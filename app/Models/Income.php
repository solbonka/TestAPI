<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "income_id",
            "number",
            "date",
            "last_change_date",
            "supplier_article",
            "tech_size",
            "barcode",
            "quantity",
            "total_price",
            "date_close",
            "warehouse_name",
            "nm_id",
            "status",
    ];
}

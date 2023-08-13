<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Support\Facades\Http;

class StockController extends Controller
{
    public function add(): string
    {
        $today = date('Y-m-d');
        $response = Http::get("http://89.108.115.241:6969/api/stocks?dateFrom=$today&page=1&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie&limit=100");

      if ($response->successful()) {
          foreach ($response['data'] as $data) {
                  Stock::updateOrCreate([
                        "date" => $data['date'],
                        "last_change_date" => $data['last_change_date'],
                        "supplier_article" => $data['supplier_article'],
                        "tech_size" => $data['tech_size'],
                        "barcode" => $data['barcode'],
                        "quantity" => $data['quantity'],
                        "is_supply" => $data['is_supply'],
                        "is_realization" => $data['is_realization'],
                        "quantity_full" => $data['quantity_full'],
                        "warehouse_name" => $data['warehouse_name'],
                        "in_way_to_client" => $data['in_way_to_client'],
                        "in_way_from_client" => $data['in_way_from_client'],
                        "nm_id" => $data['nm_id'],
                        "subject" => $data['subject'],
                        "category" => $data['category'],
                        "brand" => $data['brand'],
                        "sc_code" => $data['sc_code'],
                        "price" => $data['price'],
                        "discount" => $data['discount'],
              ]);
          }
      }

        return json_encode($response['data']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IncomeController extends Controller
{
    public function add(Request $request): string
    {
        $requestUri = $request->getRequestUri();
        $response = Http::get("http://89.108.115.241:6969$requestUri");
        if ($response->successful() || $response['data']) {
            foreach ($response['data'] as $data) {
                Income::updateOrCreate([
                    "income_id" => $data['income_id'],
                    "number" => $data['number'],
                    "date" => $data['date'],
                    "last_change_date" => $data['last_change_date'],
                    "supplier_article" => $data['supplier_article'],
                    "tech_size" => $data['tech_size'],
                    "barcode" => $data['barcode'],
                    "quantity" => $data['quantity'],
                    "total_price" => $data['total_price'],
                    "date_close" => $data['date_close'],
                    "warehouse_name" => $data['warehouse_name'],
                    "nm_id" => $data['nm_id'],
                    "status" => $data['status'],
                    ]);
            }
        }

        return json_encode([$response['data']]);
    }
}

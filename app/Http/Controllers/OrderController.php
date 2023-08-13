<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function add(Request $request): string
    {
        $requestUri = $request->getRequestUri();
        $response = Http::get("http://89.108.115.241:6969$requestUri");
        if ($response->successful() || $response['data']) {
            foreach ($response['data'] as $data) {
                Order::updateOrCreate([
                    "g_number" => $data['g_number'],
                    "date" => $data['date'],
                    "last_change_date" => $data['last_change_date'],
                    "supplier_article" => $data['supplier_article'],
                    "tech_size" => $data['tech_size'],
                    "barcode" => $data['barcode'],
                    "total_price" => $data['total_price'],
                    "discount_percent" => $data['discount_percent'],
                    "warehouse_name" => $data['warehouse_name'],
                    "oblast" => $data['oblast'],
                    "income_id" => $data['income_id'],
                    "odid" => $data['odid'],
                    "nm_id" => $data['nm_id'],
                    "subject" => $data['subject'],
                    "category" => $data['category'],
                    "brand" => $data['brand'],
                    "is_cancel" => $data['is_cancel'],
                    "cancel_dt" => $data['cancel_dt'],
                ]);
            }
        }

        return json_encode($response['data']);
    }
}

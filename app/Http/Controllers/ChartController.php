<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Service;

class ChartController extends Controller
{
    public function showChartData()
    {
        // Fetch sales data with combined company_cost and mark_up as amount
        $sales = Agent::selectRaw('company_cost + mark_up as amount, created_at')->get();
        
        // Fetch services data
        $services = Service::select('service_name', 'created_at')->get();
        
        // Prepare data for the chart
        $chartData = [
            'sales' => $sales,
            'services' => $services,
        ];

        return view('dashboard', compact('chartData'));
    }
}

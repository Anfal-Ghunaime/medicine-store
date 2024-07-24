<?php

namespace App\Http\Controllers;

use App\Models\Med;
use App\Models\Order;
use App\Models\OrderMed;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function newReport(Request $request): JsonResponse
    {
        $request->validate([
            'start' => ['required'],
            'end' => ['required'],
            'id' => ['required']
        ]);
        $meds = [];
        $reportMeds = [];
        $start = Carbon::parse($request['start']);
        $end = Carbon::parse($request['end']);
        $orders = Order::query()->where('pharmacist_id', $request['id'])
            ->whereBetween('created_at', [$start, $end])->get();
        foreach ($orders as $order) {
            $orderMeds = OrderMed::query()->where('order_id', $order['id'])->get();
            foreach ($orderMeds as $orderMed) {
                $med = Med::query()->where('id', $orderMed['med_id'])->first('t_name');
                array_push($meds, ['name' => $med, 'quantity' => $orderMed['quantity']]);
            }
        }
        foreach ($meds as $med) {
            $found = false;
            foreach ($reportMeds as &$reportMed){
                if ($reportMed['name'] == $med['name']){
                    $reportMed['quantity'] += $med['quantity'];
                    $found = true;
                }
            }
            if (!$found){
                $reportMeds[] = $med;
            }
        }
        $reportMeds = json_encode($reportMeds);
        $report = Report::query()->create([
            'user_id' => $request['id'],
            'meds' => $reportMeds,
        ]);
        return response()->json($report);
    }

    public function myReports(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required'],
        ]);
        $reports = Report::query()->where('user_id', $request['id'])->get();
        foreach ($reports as $report){
            $report['meds'] = json_decode($report['meds']);
        }
        return response()->json($reports);
    }
}

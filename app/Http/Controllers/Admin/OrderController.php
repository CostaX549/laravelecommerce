<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    
    public function index(Request $request) {
        /* $todayDate = Carbon::now()->startOfDay();
        $orders = Order::where('created_at', '>=', $todayDate)->paginate(8); */

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function($q) use ($request) {
                return  $q->whereDate('created_at', $request->date);
        }, function($q) use($todayDate) {
            return $q->whereDate('created_at', $todayDate);
             })
        ->when($request->status != null, function($q) use ($request) {
            return  $q->where('status_message', $request->status);
           })
           ->paginate(8);
      
        return view('admin.orders.index', compact('orders')); 
    }

    public function show(int $orderId) {
      
        $order = Order::where('id', $orderId)->first();
        if($order) {
            return view('admin.orders.view', compact('order'));
        } else {
                return redirect()->back()->with('message', 'Nenhuma compra encontrada.');
        }

    }

    public function updateOrderStatus(int $orderId, Request $request) {
        $order = Order::where('id', $orderId)->first();
        if($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Status da compra atualizado');
        
        } else {
              return redirect('admin/orders/'.$orderId)->with('message', 'ID da Compra não encontrado');
        }
    }

    public function viewInvoice(int $orderId) {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId) {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('fatura-'.$order->id.'-'.$todayDate.'.pdf');

        
 
    
    }
    
}

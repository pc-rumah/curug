<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Mail\TiketMail;
use Illuminate\Http\Request;
use App\Jobs\SendTiketPdfJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // Tambahkan validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telp' => 'required|numeric',
            'qty' => 'required|integer|min:1',
        ]);

        // Tambahkan total_price dan status ke request
        $request->request->add([
            'order_code' => Order::generateOrderCode(),
            'total_price' => $request->qty * 10000,
            'status' => 'unpaid'
        ]);

        // Simpan order ke database
        $order = Order::create($request->all());

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Persiapkan data transaksi untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'name' => $request->name,
                'phone' => $request->no_telp,
            ],
        ];

        // Dapatkan token pembayaran dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Kirim data ke view
        return view('etiket.checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        // Ambil data JSON dari request
        $json = $request->all();

        // Konfigurasi server key Midtrans
        $server_key = config('midtrans.server_key');
        $hashed = hash(
            "sha512",
            $json['order_id'] .
                $json['status_code'] .
                $json['gross_amount'] .
                $server_key
        );

        // Pastikan signature key valid
        if ($hashed == $json['signature_key']) {
            $order = Order::where('order_code', $json['order_id'])->first();
            if ($order) {
                if (in_array($json['transaction_status'], ['capture', 'settlement'])) {
                    $order->update(['status' => 'paid']);
                    // Kirim email dengan tiket PDF
                    Mail::to($order->email)->send(new TiketMail($order));
                    // dispatch(new SendTiketPdfJob($order));
                } elseif ($json['transaction_status'] == 'expire') {
                    $order->update(['status' => 'expired']);
                } elseif ($json['transaction_status'] == 'cancel') {
                    $order->update(['status' => 'canceled']);
                }
            }
        }

        Log::info('Callback from Midtrans:', $request->all());
        Log::info('Order found:', ['order_id' => $order->id ?? null]);
    }

    public function invoice($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return abort(404, 'Invoice tidak ditemukan');
        }
        return view('etiket.invoice', compact('order'));
    }

    public function index()
    {
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfYear = Carbon::now()->startOfYear();

        $orders = Order::all();

        $todayCount = Order::whereDate('created_at', $today)->count();

        $weekCount = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

        $monthCount = Order::whereMonth('created_at', Carbon::now()->month)->count();

        $yearCount = Order::whereYear('created_at', Carbon::now()->year)->count();

        return view('datatiket.index', compact(
            'orders',
            'todayCount',
            'weekCount',
            'monthCount',
            'yearCount'
        ));
    }

    public function pembeli()
    {
        $data = Order::all();
        return view('pembeli', compact('data',));
    }
}

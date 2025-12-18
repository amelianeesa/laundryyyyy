<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class History extends BaseController
{
    public function index()
    {
        // 1. Cek Apakah User Sudah Login?
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // 2. Ambil ID User yang sedang login
        $userId = session()->get('user_id');

        // 3. Panggil Model Order
        $orderModel = new OrderModel();

        // 4. Ambil data pesanan KHUSUS milik user ini (user_id)
        // Diurutkan dari yang terbaru (DESC)
        $data['orders'] = $orderModel->where('user_id', $userId)
                                     ->orderBy('created_at', 'DESC')
                                     ->findAll();

        // 5. Tampilkan ke View
        return view('history', $data);
    }
}
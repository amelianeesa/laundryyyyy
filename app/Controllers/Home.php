<?php

namespace App\Controllers;

class Home extends BaseController {
    public function index() 
    {
    $settingsModel = new \App\Models\SettingsModel();
    
    $data['settings'] = $settingsModel->find(1);

    return view('pages/home', $data); 
    }

    public function contact() {
        return view('contact'); 
    }
    public function sendContact() {
    $messageModel = new \App\Models\MessageModel();
    
    $data = [
        'name'     => $this->request->getPost('name'),
        'whatsapp' => $this->request->getPost('whatsapp'),
        'message'  => $this->request->getPost('message'),
    ];

    if ($messageModel->save($data)) {
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal mengirim pesan.');
    }
}
}

    



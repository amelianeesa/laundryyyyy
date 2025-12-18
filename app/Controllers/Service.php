<?php

namespace App\Controllers;

class Service extends BaseController
{
    public function index()
    {
    
        $settingsModel = new \App\Models\SettingsModel();
        $data['settings'] = $settingsModel->find(1);

        return view('service', $data); 
    }
}
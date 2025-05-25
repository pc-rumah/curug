<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $agent = new Agent();

        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);
        $platform = $agent->platform();
        $platformVersion = $agent->version($platform);
        return view('dashboard', compact('browser', 'browserVersion', 'platform', 'platformVersion'));
    }
}

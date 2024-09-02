<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\SiteSettingsFiles;

class WebsiteController extends Controller
{
    
    public function __construct() {}

    public function home(Request $request)
    {
        $data['pageTitle'] = 'Dashboard';
        
        return view('website.home')->with($data);
    }

    public function account(Request $request)
    {
        $data['pageTitle'] = 'Account';
        return view('website.account')->with($data);
    }
}

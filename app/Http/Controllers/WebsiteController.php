<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\SiteSettingsFiles;
use App\Models\Product;
use App\Models\Testimonial;

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


    //product listing ajax
    public function productsListing(Request $request)
    {
        $products = Product::where('status', 1)->with('productImages')->get();
        if ($products) {
            return response()->json(['status' => 200, 'message' => 'Products fetched successfully', 'data' => $products]);
        } else {
            return response()->json(['status' => 404, 'message' => 'No products found']);
        }
    }

    public function testimonialsListing(Request $request){
        $testimonials = Testimonial::where('status', 1)->get();
        if ($testimonials) {
            return response()->json(['status' => 200, 'message' => 'Testimonials fetched successfully', 'data' => $testimonials]);
        } else {
            return response()->json(['status' => 404, 'message' => 'No testimonials found', 'data'=>$testimonials]);
        }
    }

}

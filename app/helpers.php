<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\Roles;
use App\Models\SiteSetting;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Testimonial;


if (!function_exists('saveMultipleImages')) {

    function saveMultipleImages($files, $path)
    {

        $savedFilePaths = [];

        if (!File::isDirectory(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }

        foreach ($files as $file) {
            $filename = $file->getClientOriginalExtension();
            $date_append = Str::random(32);
            $file->move(public_path($path), $date_append . '.' . $filename);

            $savedFilePaths[] = $path . '/' . $date_append . '.' . $filename;
        }

        return $savedFilePaths;
    }
}

if (!function_exists('saveSingleImage')) {

    function saveSingleImage($file, $path)
    {

        if (!File::isDirectory(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }

        $filename = $file->getClientOriginalExtension();
        $date_append = Str::random(32);
        $file->move(public_path($path), $date_append . '.' . $filename);

        $savedFilePaths = $path . '/' . $date_append . '.' . $filename;

        return $savedFilePaths;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($imagePath)
    {
        $imagePath = public_path($imagePath);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        } else {
            // Image not found
        }
        try {
            // Check if the file exists before attempting to delete it
            if (File::exists($imagePath)) {
                // Delete the file
                File::delete($imagePath);
                return 'Image deleted successfully';
            } else {
                return 'Image not found';
            }
        } catch (\Exception $e) {
            return 'Error deleting image: ' . $e->getMessage();
        }
    }
}

if (!function_exists('sendMail')) {
    function sendMail($send_to_name, $send_to_email, $email_from_name, $subject, $body)
    {
        try {
            $mail_val = [
                'send_to_name' => $send_to_name,
                'send_to' => $send_to_email,
                'email_from' => env('MAIL_FROM_ADDRESS'),
                'email_from_name' => $email_from_name,
                'subject' => $subject,
            ];

            Mail::send('emails.mail', ['body' => $body], function ($send) use ($mail_val) {
                $send->from($mail_val['email_from'], $mail_val['email_from_name']);
                $send->replyto($mail_val['email_from'], $mail_val['email_from_name']);
                $send->to($mail_val['send_to'], $mail_val['send_to_name'])->subject($mail_val['subject']);
            });
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo "An error occurred while sending the email: " . $e->getMessage();
            return false;
        }
    }
}

if (!function_exists('sendMailAttachment')) {
    function sendMailAttachment($send_to_name, $send_to_email, $email_from_name, $subject, $body, $attachment_path)
    {
        try {
            $mail_val = [
                'send_to_name' => $send_to_name,
                'send_to' => $send_to_email,
                'email_from' => 'noreply@pancard.com',
                'email_from_name' => $email_from_name,
                'subject' => $subject,
            ];

            Mail::send('emails.mail', ['body' => $body], function ($send) use ($mail_val, $attachment_path) {
                $send->from($mail_val['email_from'], $mail_val['email_from_name']);
                $send->replyTo($mail_val['email_from'], $mail_val['email_from_name']);
                $send->to($mail_val['send_to'], $mail_val['send_to_name'])->subject($mail_val['subject']);

                // Attach the file
                if (!empty($attachment_path) && file_exists($attachment_path)) {
                    $send->attach($attachment_path);
                }
            });

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo "An error occurred while sending the email: " . $e->getMessage();
            return false;
        }
    }
}

if (!function_exists('sendMailAttachment')) {
    function sendMailAttachment($send_to_name, $send_to_email, $email_from_name, $subject, $body, $attachment_path)
    {
        try {
            $mail_val = [
                'send_to_name' => $send_to_name,
                'send_to' => $send_to_email,
                'email_from' => 'noreply@pancard.com',
                'email_from_name' => $email_from_name,
                'subject' => $subject,
            ];

            Mail::send('emails.mail', ['body' => $body], function ($send) use ($mail_val, $attachment_path) {
                $send->from($mail_val['email_from'], $mail_val['email_from_name']);
                $send->replyTo($mail_val['email_from'], $mail_val['email_from_name']);
                $send->to($mail_val['send_to'], $mail_val['send_to_name'])->subject($mail_val['subject']);

                // Attach the file
                if (!empty($attachment_path) && file_exists($attachment_path)) {
                    $send->attach($attachment_path);
                }
            });

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo "An error occurred while sending the email: " . $e->getMessage();
            return false;
        }
    }
}

if (!function_exists('getWebsiteSettings')) {
    function getWebsiteSettings()
    {
        try {
            $settings = SiteSetting::with(['settingFiles'])->first();
            return $settings;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}

if (!function_exists('getFeaturedProducts')) {
    function getFeaturedProducts()
    {
        try {
            $featured = Product::where('featured', 1)
                ->where('status', 1)
                ->with([
                    'productImages',
                    'category',
                    'ratings' => function ($query) {
                        $query->where('status', 1); // Only fetch ratings with status 1
                    }
                ])
                ->get();
            return $featured;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}


if (!function_exists('getDiscountedProducts')) {
    function getDiscountedProducts()
    {
        try {
            $discountedProducts = Product::where('is_offered', '1')->where('status', '1')
                ->limit(2)
                ->with(['productImages'])
                ->get();
            return $discountedProducts;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }


    if (!function_exists('siteCommonData')) {
        function siteCommonData()
        {
            $data = [];
            // Fetch site settings, products, categories, and brands
            $data['settings'] = SiteSetting::first();
            $data['products'] = Product::all(); // Consider limiting or paginating if needed
            $data['categories'] = Category::all(); // You can also optimize queries
            $data['brands'] = Brand::all(); // Use consistent lowercase for the key
            return $data;
        }
    }



    if (!function_exists('testimonials')) {

        function testimonials()
        {
            $testimonials = Testimonial::where('status', '1')->get();
            return $testimonials;
        }
    }
    if (!function_exists('calculateDiscount')) {

        function calculateDiscount($price, $percentage)
        {
            $discount = ($price * $percentage) / 100;
            return $price - $discount;
        }
    }


    if (!function_exists('calculateAvgRating')) {
        // Helper function to calculate average rating
        function calculateAvgRating($ratings)
        {
            if (empty($ratings)) {
                return 0;
            }
            $total = array_reduce($ratings, function ($acc, $curr) {
                return $acc + $curr['rating'];
            }, 0);
            return number_format($total / count($ratings), 1);
        }
    }

    if (!function_exists('renderStars')) {
        function renderStars($avgRating, $totalStars = 5)
        {
            $starsHtml = '';

            for ($i = 0; $i < $totalStars; $i++) {
                if ($i < floor($avgRating)) {
                    // Fully filled star
                    $starsHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#FFD700" d="M12 2l2.17 6.16H21l-4.93 3.58 1.88 6.11L12 14.79 6.05 17.85l1.88-6.11L3 8.16h6.83L12 2z"></path></svg>';
                } elseif ($i === floor($avgRating) && fmod($avgRating, 1) !== 0) {
                    // Half star
                    $starsHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#ddd" d="M12 2l2.17 6.16H21l-4.93 3.58 1.88 6.11L12 14.79 6.05 17.85l1.88-6.11L3 8.16h6.83L12 2z"></path><path fill="#FFD700" d="M12 2l-2.17 6.16H3l4.93 3.58-1.88 6.11L12 14.79V2z"></path></svg>';
                } else {
                    // Empty star
                    $starsHtml .= '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#ddd" d="M12 2l2.17 6.16H21l-4.93 3.58 1.88 6.11L12 14.79 6.05 17.85l1.88-6.11L3 8.16h6.83L12 2z"></path></svg>';
                }
            }

            return $starsHtml;
        }
    }
}

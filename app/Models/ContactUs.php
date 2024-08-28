<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email_address',
        'order_number',
        'company_name',
        'rma_number',
        'comment',
        'reply',
        'status'
    ];
}

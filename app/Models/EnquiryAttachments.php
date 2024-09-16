<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryAttachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquirymessage_id', // Adjusted this to match the actual column name
        'filetype',
        'filepath'
    ];

    public function enquiryMessage()
    {
        return $this->belongsTo(EnquiryMessages::class); // Adjusted the foreign key
    }
}

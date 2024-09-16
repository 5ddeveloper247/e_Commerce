<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiry_id',
        'message',
        'source_from',
        'source_id'
    ];

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }

    public function enquiryAttachments()
    {
        return $this->hasMany(EnquiryAttachments::class, 'enquirymessage_id');
    }

    public function source()
    {
        return $this->belongsTo(User::class, 'source_id');
    }

    public function sourceFrom()
    {
        return $this->belongsTo(User::class, 'source_from');
    }
}

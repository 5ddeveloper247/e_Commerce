<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'title',
        'description',
        'status'  // pending, resolved, closed  (enum)  for status tracking   (0,1,2) for status  (boolean) for status (true,false) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status  (boolean) for status
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function enquiryMessage()
    {
        return $this->hasMany(EnquiryMessages::class);
    }
}

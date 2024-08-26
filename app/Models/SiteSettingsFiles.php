<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettingsFiles extends Model
{
    use HasFactory;

    protected $fillable = ['settings_id', 'file_path'];
}

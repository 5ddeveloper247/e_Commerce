<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone',
        'email',
        'address',
        'website_name',
        'banner_heading',
        'sub_heading',
        'logo',
    ];


    public function settingFiles()
    {
        return $this->hasMany(SiteSettingsFiles::class, 'settings_id');
    }
}

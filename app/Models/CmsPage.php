<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPage extends Model
{
    use HasFactory;

    protected $table = 'cms_pages';
    protected $primaryKey = 'cms_page_id';
    protected $fillable = [
        'cms_page_id',
        'title',
        'text',
        'slug'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HtmlSnippet extends Model
{
    use HasFactory;use SoftDeletes;
    
    protected $fillable = ['title', 'description', 'html_code'];
}

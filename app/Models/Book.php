<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['publisher_id', 'title', 'description'];

    // We'll use Query Builder in controller, so no Eloquent relations here.
}
?>
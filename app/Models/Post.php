<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    // Specify the primary key column.
    protected $primaryKey = 'id';

    // Define the fillable attributes
    protected $fillable = [
        'title',
        'user_id',
        'description',
    ];
}

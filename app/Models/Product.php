<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $table = 'products';
    protected $guarded = ['uuid'];
    protected $fillable = [
        'title',
        'price',
        'desc',
        'size',
        'link',
        'image',
        'is_deleted'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName() {
        return 'uuid';
    }
}

<?php

namespace App\Models;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    use UUID;

    protected $table = 'products';
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'price',
        'desc',
        'size',
        'link',
        'image',
        'is_deleted'
    ];

    protected $casts = [
        'size' => 'array'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName() {
        return 'id';
    }
}

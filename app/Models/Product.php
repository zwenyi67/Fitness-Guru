<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn($query) =>
        $query
            ->where('name', 'like', '%' . $search . '%')
        ));

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('category', fn ($query) =>
        $query->where('id', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas('author', fn ($query) =>
        $query->where('id', $author)));

        $query->when($filters['price'] ?? false, fn ($query, $price) =>
        $query->whereHas('price', fn ($query) =>
        $query->where('id', $price)));
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
        }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }


}

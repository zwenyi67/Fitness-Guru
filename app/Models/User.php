<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    // protected $with = ['sport','search'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn($query) => $query->where('name', 'like', '%' . $search . '%')
        ));

        $query->when($filters['sport'] ?? false, fn ($query, $sport) =>
        $query->whereHas('sport', fn ($query) =>
        $query->where('id', $sport)));

        $query->when($filters['region'] ?? false, fn ($query, $region) =>
        $query->whereHas('region', fn ($query) =>
        $query->where('id', $region)));

        $query->when($filters['gender'] ?? false, fn ($query, $gender) =>
        $query->where(fn($query) => $query->where('gender', $gender)));

        if(isset($filters['ex-1']) && isset($filters['ex-2'])) {
        $query->when($filters['ex-1'] && $filters['ex-2'], fn ($query) =>
    $query->whereBetween('experience', [$filters['ex-1'], $filters['ex-2']]));
        }

        if(isset($filters['hour-1']) && isset($filters['hour-2'])) {
    $query->when($filters['hour-1'] && $filters['hour-2'], fn ($query) =>
    $query->whereBetween('hourly_rate', [$filters['hour-1'], $filters['hour-2']]));
        }

        if(isset($filters['age-1']) && isset($filters['age-2'])) {
            $query->when($filters['age-1'] && $filters['age-2'], fn ($query) =>
        $query->whereBetween('age', [$filters['age-1'], $filters['age-2']]));
            }

    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'trainer_id');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'user_id');
    }

    public function trainerReviews()
    {
        return $this->hasMany(TrainerReview::class, 'trainer_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

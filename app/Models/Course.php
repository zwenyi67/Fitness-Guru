<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
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

        $query->when($filters['topic'] ?? false, fn ($query, $topic) =>
        $query->whereHas('topic', fn ($query) =>
        $query->where('id', $topic)));

        $query->when($filters['method'] ?? false, fn ($query, $method) =>
        $query->where(fn($query) => $query->where('method', $method)));

        if(isset($filters['fee-1']) && isset($filters['fee-2'])) {
            $query->when($filters['fee-1'] && $filters['fee-2'], fn ($query) =>
        $query->whereBetween('price', [$filters['fee-1'], $filters['fee-2']]));
        }
    }

    public function topic()
    {
        return $this->belongsTo(CourseTopic::class);
    }

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function course_messages()
    {
        return $this->hasMany(CourseMessage::class);
    }
}

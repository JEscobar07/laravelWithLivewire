<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    // Define qué campos se pueden llenar automáticamente
    protected $fillable = [
        "name",
        "description"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Seller
 * @package App\Models
 */
class Seller extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'status_enum',
    ];

    /**
     * @return HasMany
     */
    public function supportTickets() {
        return $this->hasMany(SupportTicket::class);
    }
}

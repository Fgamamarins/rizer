<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SupportTicket
 * @package App\Models
 */
class SupportTicket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'subject',
        'description',
        'open_ticket_date',
        'status_enum',
        'seller_id'
    ];

    /**
     * @return BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}

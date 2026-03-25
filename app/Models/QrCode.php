<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QrCode extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'traceability_id',
        'label',
        'payload',
        'format',
        'size',
        'is_primary',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'size' => 'integer',
        'is_primary' => 'boolean',
    ];

    /**
     * Get the traceability record for the QR code.
     */
    public function traceability(): BelongsTo
    {
        return $this->belongsTo(Traceability::class);
    }
}

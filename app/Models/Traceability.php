<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Traceability extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'batch',
        'issuer',
        'image',
        'variety',
        'origin',
        'score',
        'grade',
        'badges',
        'impact_cards',
        'journey_steps',
        'estate_eyebrow',
        'estate_title',
        'estate_description',
        'farmer_image',
        'farmer_name',
        'farmer_role',
        'estate_details',
        'process_eyebrow',
        'process_title',
        'process_details',
        'sensory_profile',
        'process_note',
        'blockchain_hash',
        'blockchain_description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'badges' => 'array',
        'impact_cards' => 'array',
        'journey_steps' => 'array',
        'estate_details' => 'array',
        'process_details' => 'array',
        'sensory_profile' => 'array',
    ];

    /**
     * Get the QR codes associated with the traceability record.
     */
    public function qrCodes(): HasMany
    {
        return $this->hasMany(QrCode::class);
    }
}

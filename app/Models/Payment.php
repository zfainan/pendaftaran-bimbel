<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Database\Factories\PaymentFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                             $id
 * @property      int                             $registration_id
 * @property      int                             $jumlah
 * @property      string|null                     $status
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Registration|null   $registration
 */
class Payment extends Model
{
    use HasFactory;

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }
}

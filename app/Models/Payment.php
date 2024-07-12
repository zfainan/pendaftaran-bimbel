<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static \Database\Factories\PaymentFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                                                                                           $id
 * @property      int                                                                                           $registration_id
 * @property      int                                                                                           $jumlah
 * @property      string|null                                                                                   $status
 * @property      \Illuminate\Support\Carbon|null                                                               $created_at
 * @property      \Illuminate\Support\Carbon|null                                                               $updated_at
 * @property      string|null                                                                                   $tanggal
 * @property-read \App\Models\Registration|null                                                                 $registration
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 */
class Payment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['registration_id', 'status', 'jumlah', 'tanggal'];

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }
}

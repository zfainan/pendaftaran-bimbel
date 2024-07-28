<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @method static \Database\Factories\StudentFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                                                                 $id
 * @property      string                                                              $nama
 * @property      string|null                                                         $tempat_lahir
 * @property      string|null                                                         $tgl_lahir
 * @property      string|null                                                         $gender
 * @property      int|null                                                            $kelas
 * @property      string|null                                                         $asal_sekolah
 * @property      string|null                                                         $no_telp
 * @property      string|null                                                         $nama_ortu
 * @property      string|null                                                         $pekerjaan_ortu
 * @property      string|null                                                         $no_telp_ortu
 * @property      \Illuminate\Support\Carbon|null                                     $created_at
 * @property      \Illuminate\Support\Carbon|null                                     $updated_at
 * @property      bool                                                                $is_active
 * @property-read \App\Models\User|null                                               $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Registration[] $registrations
 * @property-read \App\Models\Registration|null                                       $registration
 */
class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'gender',
        'kelas',
        'asal_sekolah',
        'no_telp',
        'nama_ortu',
        'pekerjaan_ortu',
        'no_telp_ortu',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function registration(): HasOne
    {
        return $this->hasOne(Registration::class);
    }
}

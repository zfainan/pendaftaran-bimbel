<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @method static \Database\Factories\StudentFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                             $id
 * @property      string                          $nama
 * @property      string                          $tempat_lahir
 * @property      string                          $tgl_lahir
 * @property      string                          $gender
 * @property      int                             $kelas
 * @property      string                          $asal_sekolah
 * @property      string                          $no_telp
 * @property      string                          $nama_ortu
 * @property      string                          $pekerjaan_ortu
 * @property      string                          $no_telp_ortu
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null           $user
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
        'no_telp_ortu'
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }
}

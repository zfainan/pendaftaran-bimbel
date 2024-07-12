<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static \Database\Factories\UserFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                                      $id
 * @property      string                                   $userable_type
 * @property      int                                      $userable_id
 * @property      string                                   $email
 * @property      \Illuminate\Support\Carbon|null          $email_verified_at
 * @property      string                                   $password
 * @property      string|null                              $remember_token
 * @property      \Illuminate\Support\Carbon|null          $created_at
 * @property      \Illuminate\Support\Carbon|null          $updated_at
 * @property      mixed                                    $role
 * @property-read \Illuminate\Database\Eloquent\Model|null $userable
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Interact with the  attribute.
     *
     * return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function role(): Attribute
    {
        $role = match ($this->userable?->getMorphClass()) {
            Student::class => 'Student',
            Admin::class => 'Admin',
            default => null,
        };

        return Attribute::make(
            get: fn () => $role,
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userable(): MorphTo
    {
        return $this->morphTo();
    }
}

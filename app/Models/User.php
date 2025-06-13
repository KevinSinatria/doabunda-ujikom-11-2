<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function canAccessPanel(Panel $panel): bool
    {
        Log::info('User accessing Filament panel:', [
            'user_id' => $this->id,
            'user_email' => $this->email,
            'user_name' => $this->username,
            'panel_id' => $panel->getId(),
        ]);

        return Auth::check() && Auth::user()->role == 'admin';
    }

    public function canAccessProfile(Panel $panel): bool
    {
        return $this->canAccessPanel($panel);
    }

    public function getFilamentName(): string
    {
        return $this->username ?? $this->email ?? 'Admin';
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }

    public function testimonyPermissions()
    {
        return $this->hasMany(TestimonyPermission::class, 'user_id', 'id');
    }

    public function testimonies()
    {
        return $this->hasMany(Testimony::class, 'user_id', 'id');
    }
}

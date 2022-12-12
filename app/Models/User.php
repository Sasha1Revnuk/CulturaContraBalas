<?php

namespace App\Models;

use App\Enumerators\Admin\RolesEnumerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'father_name',
        'phone',
        'api_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->father_name;
    }

    public function scopeNotAuthUser(Builder $builder): Builder
    {
        return $builder->where('id', '<>', auth()->user()->id);
    }

    public function scopeNotSuperAdmin(Builder $builder): Builder
    {
        return $builder->whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', [RolesEnumerator::ROLE_SUPER_ADMINISTRATOR]);
        });
    }

    public function adminSettings(): BelongsToMany
    {
        return $this->belongsToMany(AdminSettings::class)->withPivot('value');
    }

    public function getArrayOfAdminSettingsAttribute(): array
    {
        $result = [];
        $this->adminSettings->map(function ($item) use (&$result) {
            $result[$item->key] = $item->pivot->value;
        });
        return $result;
    }
}

<?php

namespace App\enum;

enum UserRole:string
{
    //
    
    case SUPERADMIN = 'super_admin';
    case ADMIN      = 'admin';
    case EMPLOYEE   = 'employer';

    public function label(): string
    {
        return match($this) {
            self::SUPERADMIN => 'Super Administrateur',
    
            self::ADMIN      => 'Administrateur',
            self::EMPLOYEE   => 'Employé',
        };
    }

    // ← C'EST ICI LE PROBLÈME : cette méthode doit exister
    public function level(): int
    {
        return match ($this) {
            self::SUPERADMIN => 100,
            self::ADMIN      => 50,
            self::EMPLOYEE   => 10,
        };
    }

    // Méthodes bonus utiles (optionnelles)
    public function isAtLeastAdmin(): bool
    {
        return $this->level() >= 50;
    }

    public function canViewAllPresences(): bool
    {
        return $this->level() >= 50;
    }
}

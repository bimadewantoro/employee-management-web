<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasDescription;

enum EchelonList: string implements HasLabel, HasDescription
{
    case Echelon1 = '1';
    case Echelon2 = '2';
    case Echelon3 = '3';
    case Echelon4 = '4';
    case Echelon5 = '5';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Echelon1 => 'Eselon I',
            self::Echelon2 => 'Eselon II',
            self::Echelon3 => 'Eselon III',
            self::Echelon4 => 'Eselon IV',
            self::Echelon5 => 'Eselon V',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Echelon1 => 'Eselon I',
            self::Echelon2 => 'Eselon II',
            self::Echelon3 => 'Eselon III',
            self::Echelon4 => 'Eselon IV',
            self::Echelon5 => 'Eselon V',
        };
    }
}

<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasDescription;

enum ReligionList: string implements HasLabel, HasDescription
{
    case Islam = 'Islam';
    case Protestant = 'Protestan';
    case Catholic = 'Katolik';
    case Hindu = 'Hindu';
    case Buddhist = 'Buddha';
    case Konghucu = 'Konghucu';
    case Other = 'Lainnya';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Islam => 'Islam',
            self::Protestant => 'Protestan',
            self::Catholic => 'Katolik',
            self::Hindu => 'Hindu',
            self::Buddhist => 'Buddha',
            self::Konghucu => 'Konghucu',
            self::Other => 'Lainnya',
            default => $this->name,
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Islam => 'Islam',
            self::Protestant => 'Protestan',
            self::Catholic => 'Katolik',
            self::Hindu => 'Hindu',
            self::Buddhist => 'Buddha',
            self::Konghucu => 'Konghucu',
            self::Other => 'Lainnya',
        };
    }
}

<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasDescription;

enum GroupList: string implements HasLabel, HasDescription
{
    case GroupIa = 'I/a';
    case GroupIb = 'I/b';
    case GroupIc = 'I/c';
    case GroupId = 'I/d';
    case GroupIIa = 'II/a';
    case GroupIIb = 'II/b';
    case GroupIIc = 'II/c';
    case GroupIId = 'II/d';
    case GroupIIIa = 'III/a';
    case GroupIIIb = 'III/b';
    case GroupIIIc = 'III/c';
    case GroupIIId = 'III/d';
    case GroupIVa = 'IV/a';
    case GroupIVb = 'IV/b';
    case GroupIVc = 'IV/c';
    case GroupIVd = 'IV/d';
    case GroupIVe = 'IV/e';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::GroupIa => 'Juru Muda(I/A)',
            self::GroupIb => 'Juru Muda Tingkat I(I/B)',
            self::GroupIc => 'Juru(I/C)',
            self::GroupId => 'Juru Tingkat(I/D)',
            self::GroupIIa => 'Pengatur Muda(II/A)',
            self::GroupIIb => 'Pengatur Muda Tingkat I(II/B)',
            self::GroupIIc => 'Pengatur(II/C)',
            self::GroupIId => 'Pengatur Tingkat I(II/D)',
            self::GroupIIIa => 'Penata Muda(III/A)',
            self::GroupIIIb => 'Penata Muda Tingkat I(III/B)',
            self::GroupIIIc => 'Penata(III/C)',
            self::GroupIIId => 'Penata Tingkat I(III/D)',
            self::GroupIVa => 'Pembina(IV/A)',
            self::GroupIVb => 'Pembina Tingkat I(IV/B)',
            self::GroupIVc => 'Pembina Muda(IV/C)',
            self::GroupIVd => 'Pembina Madya(IV/D)',
            self::GroupIVe => 'Pembina Utama(IV/E)',
            default => $this->name,
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::GroupIa => 'Golongan I (Juru) - Juru Muda',
            self::GroupIb => 'Golongan I (Juru) - Juru Muda Tingkat I',
            self::GroupIc => 'Golongan I (Juru) - Juru',
            self::GroupId => 'Golongan I (Juru) - Juru Tingkat',
            self::GroupIIa => 'Golongan II (Pengatur) - Pengatur Muda',
            self::GroupIIb => 'Golongan II (Pengatur) - Pengatur Muda Tingkat I',
            self::GroupIIc => 'Golongan II (Pengatur) - Pengatur',
            self::GroupIId => 'Golongan II (Pengatur) - Pengatur Tingkat I',
            self::GroupIIIa => 'Golongan III (Penata) - Penata Muda',
            self::GroupIIIb => 'Golongan III (Penata) - Penata Muda Tingkat I',
            self::GroupIIIc => 'Golongan III (Penata) - Penata',
            self::GroupIIId => 'Golongan III (Penata) - Penata Tingkat I',
            self::GroupIVa => 'Golongan IV (Pembina) - Pembina',
            self::GroupIVb => 'Golongan IV (Pembina) - Pembina Tingkat I',
            self::GroupIVc => 'Golongan IV (Pembina) - Pembina Muda',
            self::GroupIVd => 'Golongan IV (Pembina) - Pembina Madya',
            self::GroupIVe => 'Golongan IV (Pembina) - Pembina Utama',
        };
    }
}

<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Add Employee'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EmployeeResource\Widgets\EmployeeOverview::class,
        ];
    }
}

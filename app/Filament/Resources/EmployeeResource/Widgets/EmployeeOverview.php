<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Employees', Employee::count())
                ->description('Total number of employees')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Total Male Employees', Employee::where('gender', 'Male')->count())
                ->description('Total number of male employees')
                ->descriptionIcon('heroicon-m-user-minus')
                ->color('info'),
            Stat::make('Total Female Employees', Employee::where('gender', 'Female')->count())
                ->description('Total number of female employees')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('info'),
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalEmployees = Employee::count();
        $totalUsers = User::count();

        return [
            Stat::make('Total Employee', $totalEmployees)
                ->description('Total number of employees')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Total Users', $totalUsers)
                ->description('Total number of users')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
        ];
    }
}

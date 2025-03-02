<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GroupsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $groups = [
            'I' => ['I/a', 'I/b', 'I/c', 'I/d'],
            'II' => ['II/a', 'II/b', 'II/c', 'II/d'],
            'III' => ['III/a', 'III/b', 'III/c', 'III/d'],
            'IV' => ['IV/a', 'IV/b', 'IV/c', 'IV/d', 'IV/e'],
        ];

        $stats = [];
        foreach ($groups as $groupName => $groupValues) {
            $employeeCount = Employee::whereIn('group', $groupValues)->count();
            $stats[] = Stat::make("Total Employees Golongan $groupName", $employeeCount)
                ->description("Total number of employees in Golongan $groupName")
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning');
        }

        return $stats;
    }
}

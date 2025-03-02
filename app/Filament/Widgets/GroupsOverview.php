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
            'IV' => ['IV/a', 'IV/b', 'IV/c', 'IV/d', 'IV/e'],
            'III' => ['III/a', 'III/b', 'III/c', 'III/d'],
            'II' => ['II/a', 'II/b', 'II/c', 'II/d'],
            'I' => ['I/a', 'I/b', 'I/c', 'I/d'],
        ];

        $stats = [];
        foreach ($groups as $groupName => $groupValues) {
            $employeeCount = Employee::whereIn('group', $groupValues)->count();
            $stats[] = Stat::make("Total Employees Group $groupName", $employeeCount)
                ->description("Total number of employees in Group $groupName")
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning');
        }

        return $stats;
    }
}

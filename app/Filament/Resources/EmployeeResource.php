<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use App\Enums\GroupList;
use App\Enums\EchelonList;
use App\Enums\ReligionList;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $pluralLabel = 'Employees Data';

    protected static ?string $navigationGroup = 'Employees Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('employee_id')
                    ->label('NIP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('birth_place')
                    ->label('Tempat Lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->required()
                    ->options([
                        'Male' => 'Laki-laki',
                        'Female' => 'Perempuan',
                    ]),
                Forms\Components\Select::make('group')
                    ->label('Golongan')
                    ->required()
                    ->options(GroupList::class)
                    ->searchable(),
                Forms\Components\Select::make('echelon')
                    ->label('Eselon')
                    ->required()
                    ->options(EchelonList::class),
                Forms\Components\TextInput::make('position')
                    ->label('Jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('place_of_duty')
                    ->label('Tempat Tugas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('religion')
                    ->label('Agama')
                    ->required()
                    ->options(ReligionList::class),
                Forms\Components\TextInput::make('work_unit')
                    ->label('Unit Kerja')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('npwp')
                    ->label('NPWP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('profile_picture')
                    ->label('Foto Pegawai')
                    ->image()
                    ->maxSize(2048)
                    ->imageCropAspectRatio('3:4')
                    ->imageResizeTargetWidth(300)
                    ->imageResizeTargetHeight(400)
                    ->openable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee_id')
                    ->label('NIP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('profile_picture')
                    ->label('Foto Profil')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('birth_place')
                    ->label('Tempat Lahir')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return $state === 'Male' ? 'L' : 'P';
                    }),
                Tables\Columns\TextColumn::make('group')
                    ->label('Golongan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('echelon')
                    ->label('Eselon')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place_of_duty')
                    ->label('Tempat Tugas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('religion')
                    ->label('Agama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('work_unit')
                    ->label('Unit Kerja')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Nomor Telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npwp')
                    ->label('NPWP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Male' => 'Laki-laki',
                        'Female' => 'Perempuan',
                    ]),
                Tables\Filters\SelectFilter::make('group')
                    ->label('Golongan')
                    ->options(GroupList::class)
                    ->multiple()
                    ->searchable(),
                Tables\Filters\SelectFilter::make('echelon')
                    ->label('Eselon')
                    ->multiple()
                    ->options(EchelonList::class),
                Tables\Filters\SelectFilter::make('religion')
                    ->label('Agama')
                    ->multiple()
                    ->options(ReligionList::class),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                FilamentExportBulkAction::make('export')
                    ->label('Export Selected Data'),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Export Data'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::$model::count();
    }

    public static function getWidgets(): array
    {
        return [
            EmployeeResource\Widgets\EmployeeOverview::class,
        ];
    }
}

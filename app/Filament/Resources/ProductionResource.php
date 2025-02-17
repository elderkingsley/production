<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductionResource\Pages;
use App\Filament\Resources\ProductionResource\RelationManagers;
use App\Models\Production;
use Filament\Forms\Components;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductionResource extends Resource
{
    protected static ?string $model = Production::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationLabel = 'DAILY PRODUCTION';

    protected static ?string $modelLabel = 'Daily Production';

    public static function form(Form $form): Form
    {
        return $form
                    ->schema([

                        Forms\Components\Section::make('Daily Data')
                        ->description('Day Information')
                            ->schema([
                                Forms\Components\DatePicker::make('date')
                                ->required()
                                ->native(false)
                                ->displayFormat('d/m/Y'),
                                
                                Forms\Components\Radio::make('shift')->options([
                                'Day' => 'Morning Shift',
                                'Night' => 'Night Shift',
                                ])
                                ->inline()
                                ->inlineLabel(false),
                                
                                Forms\Components\TextInput::make('number_of_workers')
                                ->numeric()
                                ->required(),
                            ]),

                        Forms\Components\Section::make('Process Data')
                        ->description('Process Information') 
                            ->schema([
                                Select::make('process')->options([
                                'Packing' => 'Packing',
                                'Shaking' => 'Shaking',
                                'Drying' => 'Drying',
                                'Briquetting' => 'Briquetting',
                                'Carbonizing' => 'Carbonizing',
                            ]),

                        TextInput::make('number_of_bags_produced')
                        ->numeric(),

                        TextInput::make('weight_produced')
                        ->numeric(),

                        Select::make('machine_used')->options([
                        'Workers Hands' => 'Workers Hands',
                        'Shaker' => 'Shaker',
                        'Dryer' => 'Dryer',
                        'Briquette 1' => 'Briquette 1',
                        'Briquette 2' => 'Briquette 2',
                        'Briquette 3' => 'Briquette 3',
                        'Carbonizer 1' => 'Carbonizer 1',
                        'Carbonizer 2' => 'Carbonizer 2',
                        'Carbonizer 3' => 'Carbonizer 3',
                        'Carbonizer 4' => 'Carbonizer 4',
                        ]),    

                    ]),

                    Forms\Components\Section::make('Material Input Data')
                    ->description('Material Input Information') 
                        ->schema([
                            Select::make('material_used')->options([
                            'PKS' => 'PKS',
                            'Sawdust' => 'Sawdust',
                            'Woodlogs (Briquettes)' => 'Woodlogs (Briquettes)',
                        ]),

                        TextInput::make('number_of_bags_of_raw_material_used')
                        ->numeric(),

                        TextInput::make('weight_of_raw_materials_used')
                        ->numeric(),

                        Select::make('utilizing_machine')->options([
                        'Dryer' => 'Dryer',
                        'Gasifier' => 'Gasifier',
                        'Briquette 1' => 'Briquette 1',
                        'Briquette 2' => 'Briquette 2',
                        'Briquette 3' => 'Briquette 3',
                        'Carbonizer 1' => 'Carbonizer 1',
                        'Carbonizer 2' => 'Carbonizer 2',
                        'Carbonizer 3' => 'Carbonizer 3',
                        'Carbonizer 4' => 'Carbonizer 4',
                        ]),    

                    ]),

                Forms\Components\Section::make('General Info')
                ->description('Important Daily Info')
                    ->schema([
                       Forms\Components\Textarea::make('information'),
                    ]),  

                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->sortable(),
                Tables\Columns\TextColumn::make('date'),
                Tables\Columns\TextColumn::make('shift'),
                Tables\Columns\TextColumn::make('number_of_workers'),
                Tables\Columns\TextColumn::make('process'),
                Tables\Columns\TextColumn::make('information'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProductions::route('/'),
            'create' => Pages\CreateProduction::route('/create'),
            'edit' => Pages\EditProduction::route('/{record}/edit'),
        ];
    }
}

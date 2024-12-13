<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    /* My Own Setting */

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Tienda';

    protected static ?string $navigationLabel = 'Productos';

    protected static ?string $modelLabel = 'Producto';

    protected static ?string $recordTitleAttribute = 'name'; //para que se pueda buscar de manera global

    protected static ?string $activeNavigationIcon = 'heroicon-o-check-badge'; //cambiar el icono de la seccion activa

    public static function getNavigationBadge(): ?string
    {

        return static::getModel()::count();
    }

    /* My Own Setting */

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Category Information')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->label('')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columnSpanFull(),

                Forms\Components\Section::make('Product Information')
                    ->schema([

                        Forms\Components\TextInput::make('name')
                            ->required(),

                        Forms\Components\TextInput::make('unit_price')
                            ->required()
                            ->numeric(),

                        Forms\Components\MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),



                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('products')
                    ->columnSpanFull(),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->size(80)
                    ->circular(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('unit_price')
                    ->numeric()
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                    Tables\Actions\ForceDeleteBulkAction::make(),

                    Tables\Actions\RestoreBulkAction::make(),

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
            'index' => Pages\ListProducts::route('/'),

            'create' => Pages\CreateProduct::route('/create'),

            'view' => Pages\ViewProduct::route('/{record}'),

            'edit' => Pages\EditProduct::route('/{record}/edit'),

        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

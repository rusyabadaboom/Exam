<?php  

namespace App\Filament\Resources;  

use App\Filament\Resources\PublisherResource\Pages;  
use App\Models\Publisher;  
use Filament\Forms;  
use Filament\Forms\Form;  
use Filament\Resources\Resource;  
use Filament\Tables;  
use Filament\Tables\Table;  

class PublisherResource extends Resource  
{  
    protected static ?string $model = Publisher::class;  

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack'; // Иконка для навигации  

    protected static ?string $navigationGroup = 'Library'; // Опционально, для группировки в навигации  

    public static function form(Form $form): Form  
    {  
        return $form  
            ->schema([  
                Forms\Components\TextInput::make('name')  
                    ->required()  
                    ->label('Publisher Name'), // Заголовок поля  
                Forms\Components\TextInput::make('address')  
                    ->label('Address'), // Заголовок поля  
                Forms\Components\TextInput::make('phone')  
                    ->label('Phone'), // Заголовок поля  
            ]);  
    }  

    public static function table(Table $table): Table  
    {  
        return $table  
            ->columns([  
                Tables\Columns\TextColumn::make('name')->sortable(),  
                Tables\Columns\TextColumn::make('address')->sortable(),  
                Tables\Columns\TextColumn::make('phone')->sortable(),  
                Tables\Columns\TextColumn::make('books_count') // Число книг, связанных с издателем  
                    ->counts('books')  
                    ->label('Books Count'),  
            ])  
            ->filters([  
                // Добавьте фильтры, если это необходимо  
            ])  
            ->actions([  
                Tables\Actions\ViewAction::make(),  
                Tables\Actions\EditAction::make(),  
                Tables\Actions\DeleteAction::make(),  
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
            // Здесь можно добавить связи, если потребуется  
        ];  
    }  

    public static function getPages(): array  
    {  
        return [  
            'index' => Pages\ListPublishers::route('/'),  
            'create' => Pages\CreatePublisher::route('/create'),  
            'edit' => Pages\EditPublisher::route('/{record}/edit'),  
        ];  
    }  
}
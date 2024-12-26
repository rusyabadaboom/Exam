<?php  

namespace App\Filament\Resources;  

use App\Filament\Resources\ReaderResource\Pages;  
use App\Models\Reader;  
use Filament\Forms;  
use Filament\Forms\Form;  
use Filament\Resources\Resource;  
use Filament\Tables;  
use Filament\Tables\Table;  

class ReaderResource extends Resource  
{  
    protected static ?string $model = Reader::class;  

    protected static ?string $navigationIcon = 'heroicon-o-user';  
    
    protected static ?string $navigationGroup = 'Library'; // Группировка ресурса, если нужно  

    public static function form(Form $form): Form  
    {  
        return $form  
            ->schema([  
                Forms\Components\TextInput::make('fio')  
                    ->required()  
                    ->label('ФИО'), // Заголовок поля  
                Forms\Components\TextInput::make('address')  
                    ->required()  
                    ->label('Адрес'), // Заголовок поля  
                Forms\Components\TextInput::make('phone')  
                    ->required()  
                    ->tel() // Принять номер телефона  
                    ->label('Телефон'), // Заголовок поля  
            ]);  
    }  

    public static function table(Table $table): Table  
    {  
        return $table  
            ->columns([  
                Tables\Columns\TextColumn::make('fio')->label('ФИО')->sortable(),  
                Tables\Columns\TextColumn::make('address')->label('Адрес')->sortable(),  
                Tables\Columns\TextColumn::make('phone')->label('Телефон')->sortable(),  
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
            // Если у вас есть какие-либо отношения, добавьте их сюда  
        ];  
    }  

    public static function getPages(): array  
    {  
        return [  
            'index' => Pages\ListReaders::route('/'),  
            'create' => Pages\CreateReader::route('/create'),  
            'edit' => Pages\EditReader::route('/{record}/edit'),  
        ];  
    }  
}
<?php  

namespace App\Filament\Resources;  

use App\Filament\Resources\IssuanceResource\Pages;  
use App\Models\Issuance;  
use App\Models\Book;  
use App\Models\Reader;  
use Filament\Forms;  
use Filament\Forms\Form;  
use Filament\Resources\Resource;  
use Filament\Tables;  
use Filament\Tables\Table;  

class IssuanceResource extends Resource  
{  
    protected static ?string $model = Issuance::class;  

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';  

    protected static ?string $navigationGroup = 'Library'; // Опционально, для группировки навигации  

    public static function form(Form $form): Form  
    {  
        return $form  
            ->schema([  
                Forms\Components\Select::make('book_id')  
                    ->relationship('book', 'title') // Связь с моделью Book  
                    ->required()  
                    ->label('Book'), // Заголовок поля  
                Forms\Components\Select::make('reader_id')  
                    ->relationship('reader', 'fio') // Связь с моделью Reader  
                    ->required()  
                    ->label('Reader'), // Заголовок поля  
                Forms\Components\DatePicker::make('issue_date')  
                    ->required()  
                    ->label('Issue Date'), // Заголовок поля  
                Forms\Components\DatePicker::make('return_date')  
                    ->nullable() // Возврат может быть пустым  
                    ->label('Return Date'), // Заголовок поля  
            ]);  
    }  

    public static function table(Table $table): Table  
    {  
        return $table  
            ->columns([  
                Tables\Columns\TextColumn::make('book.title')->label('Book')->sortable(), // Название книги  
                Tables\Columns\TextColumn::make('reader.fio')->label('Reader')->sortable(), // ФИО читателя  
                Tables\Columns\TextColumn::make('issue_date')->label('Issue Date')->sortable(),  
                Tables\Columns\TextColumn::make('return_date')->label('Return Date')->sortable(), // Возврат может быть null  
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
        return [];  
    }  

    public static function getPages(): array  
    {  
        return [  
            'index' => Pages\ListIssuances::route('/'),  
            'create' => Pages\CreateIssuance::route('/create'),  
            'edit' => Pages\EditIssuance::route('/{record}/edit'),  
        ];  
    }  
}
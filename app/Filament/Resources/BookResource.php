<?php  

namespace App\Filament\Resources;  

use App\Filament\Resources\BookResource\Pages;  
use App\Models\Book;  
use Filament\Forms;  
use Filament\Forms\Form;  
use Filament\Resources\Resource;  
use Filament\Tables;  
use Filament\Tables\Table;  
use Filament\Tables\Filters\TextFilter; // Или любой другой подходящий фильтр

class BookResource extends Resource  
{  
    protected static ?string $model = Book::class;  

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';  

    protected static ?string $navigationGroup = 'Library'; // Опционально, для группировки навигации  

    public static function form(Form $form): Form  
    {  
        return $form  
            ->schema([  
                Forms\Components\TextInput::make('title')  
                    ->required()  
                    ->label('Title'), // Заголовок поля  
                Forms\Components\TextInput::make('author')  
                    ->required()  
                    ->label('Author'), // Заголовок поля  
                Forms\Components\FileUpload::make('cover')  
                    ->disk('public') // укажите нужный диск  
                    ->directory('covers')  
                    ->acceptedFileTypes(['image/*'])  
                    ->label('Cover Image'), // Заголовок поля  
                Forms\Components\TextInput::make('pages')  
                    ->required()  
                    ->numeric()  
                    ->label('Number of Pages'), // Заголовок поля  
                Forms\Components\TextInput::make('year')  
                    ->required()  
                    ->numeric()  
                    ->label('Publication Year'), // Заголовок поля  
                Forms\Components\TextInput::make('isbn')  
                    ->required()  
                    ->label('ISBN'), // Заголовок поля  
                Forms\Components\Select::make('publisher_id')  
                    ->relationship('publisher', 'name') // Предполагаем, что у вас есть связь с моделью Publisher  
                    ->required()  
                    ->label('Publisher'), // Заголовок поля  
            ]);  
    }  

    public static function table(Table $table): Table  
{  
    return $table  
        ->columns([  
            Tables\Columns\TextColumn::make('title')->sortable(),  
            Tables\Columns\TextColumn::make('author')->sortable(),  
            Tables\Columns\TextColumn::make('year')->sortable(),  
            Tables\Columns\TextColumn::make('isbn')->sortable(),  
            Tables\Columns\TextColumn::make('publisher.name')->label('Publisher'),  
        ])  
        ->filters([  
            // Удаляем текстовый фильтр  
            // TextFilter::make('title')->label('Поиск по заголовку'),  
            // TextFilter::make('author')->label('Поиск по автору'),  
            // Добавьте другие фильтры по мере необходимости  
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
            'index' => Pages\ListBooks::route('/'),  
            'create' => Pages\CreateBook::route('/create'),  
            'edit' => Pages\EditBook::route('/{record}/edit'),  
        ];  
    }  
}
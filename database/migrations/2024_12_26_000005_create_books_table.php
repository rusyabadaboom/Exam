<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreateBooksTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('books', function (Blueprint $table) {  
            $table->id();  
            $table->string('author');  
            $table->string('title');  
            $table->string('cover')->nullable(); // Картинка обложки может отсутствовать  
            $table->integer('pages'); // Количество страниц  
            $table->year('year'); // Год публикации  
            $table->string('isbn')->unique(); // ISBN книги  
            $table->foreignId('publisher_id')->constrained()->onDelete('cascade'); // Связь с Publisher  
            $table->timestamps(); // Для created_at и updated_at  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('books');  
    }  
}
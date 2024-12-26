<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreateReadersTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('readers', function (Blueprint $table) {  
            $table->id();  
            $table->string('fio'); // ФИО читателя  
            $table->string('address')->nullable(); // Адрес читателя (может отсутствовать)  
            $table->string('phone')->nullable(); // Телефон читателя (может отсутствовать)  
            $table->timestamps(); // Для created_at и updated_at  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('readers');  
    }  
}
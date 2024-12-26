<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreatePublishersTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('publishers', function (Blueprint $table) {  
            $table->id();  
            $table->string('name')->unique(); // Название издательства  
            $table->timestamps(); // Для created_at и updated_at  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('publishers');  
    }  
}
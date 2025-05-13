<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\GuestType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guest_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $guest_types = [
            ['name' => 'New Guest'],
            ['name' => 'Returning Guest'],
            ['name' => 'Frequent Guest'],
            ['name' => 'VIP Guest'],
        ];  

        foreach($guest_types as $guest_type){
            GuestType::create($guest_type);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_types');
    }
};

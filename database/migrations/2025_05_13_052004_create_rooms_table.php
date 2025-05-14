<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Room;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $rooms = [
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
            ['name' => 'Room no.'],
        ];

        foreach($rooms as $room){
            Room::create($room);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

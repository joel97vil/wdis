<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Room;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(User::class, 'user_id');
                $table->foreignIdFor(Room::class, 'room_id');
                $table->timestamp('initial_date')->useCurrent()->useCurrentOnUpdate();
                $table->timestamp('final_date')->useCurrent()->useCurrentOnUpdate();
                $table->integer('occupancy');
                $table->decimal('total_price');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};

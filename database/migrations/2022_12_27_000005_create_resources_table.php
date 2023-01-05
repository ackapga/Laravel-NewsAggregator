<?php

use App\Models\Resources;
use Database\Seeders\ResourcesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('urlName')->unique();
            $table->enum('status', [Resources::NEW, Resources::USED, Resources::UPDATE])->default(Resources::NEW);
            $table->timestamps();
        });
        (new ResourcesSeeder())->run();
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
};

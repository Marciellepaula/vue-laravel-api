<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->text('address')->change();
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->date('address')->change();
        });
    }
};

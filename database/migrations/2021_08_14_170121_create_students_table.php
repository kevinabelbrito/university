<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('id_type', 30);
            $table->string('id_number', 30);
            $table->enum('genre', ['Female', 'Male', 'Other']);
            $table->date('date_of_birth');
            $table->foreignId('career_id')
                    ->nullable()
                    ->constrained('careers')
                    ->onUpdate('set null')
                    ->onDelete('cascade');
            $table->string('email_address', 100)->nullable();
            $table->string('phone_number', 100)->nulable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

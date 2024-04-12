<?php

use App\Traits\CommonMigrationColumns;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use CommonMigrationColumns;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Create packages table
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('field_1');
            $table->longText('field_2');
            $table->integer('field_3');
            $table->decimal('field_4', 10, 2)->nullable();
            $table->date('field_5');
            $table->enum('field_6', ['yes', 'no'])->default('no');
            $table->boolean('field_7')->default(false);

            $this->reservedColumns($table);
            $this->auditInfoColumns($table);
            $table->timestamps();
            $table->softDeletes();
            $this->auditInfoColumnsForeignKeys($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Drop tables in reverse order
        Schema::dropIfExists('samples');
    }
};

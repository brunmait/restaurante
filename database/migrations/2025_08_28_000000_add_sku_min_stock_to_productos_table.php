<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('sku')->unique()->after('nombre');
            $table->integer('min_stock')->default(0)->after('stock');
        });
    }

    public function down() {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropUnique(['sku']);
            $table->dropColumn(['sku', 'min_stock']);
        });
    }
};


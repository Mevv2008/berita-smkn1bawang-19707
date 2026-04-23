<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('beritas')) {
            if (Schema::hasColumn('beritas', 'deskrpisi')) {
                DB::statement('ALTER TABLE `beritas` CHANGE `deskrpisi` `deskripsi` TEXT NULL');
            }

            if (Schema::hasColumn('beritas', 'link')) {
                // Drop unique index on link if it exists before changing type
                try {
                    DB::statement('ALTER TABLE `beritas` DROP INDEX `beritas_link_unique`');
                } catch (\Throwable $e) {
                    // index may not exist; ignore
                }

                DB::statement('ALTER TABLE `beritas` MODIFY `link` TEXT NOT NULL');
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('beritas')) {
            if (Schema::hasColumn('beritas', 'deskripsi')) {
                DB::statement('ALTER TABLE `beritas` CHANGE `deskripsi` `deskrpisi` TEXT NULL');
            }

            if (Schema::hasColumn('beritas', 'link')) {
                DB::statement('ALTER TABLE `beritas` MODIFY `link` VARCHAR(255) NOT NULL');
                DB::statement('ALTER TABLE `beritas` ADD UNIQUE `beritas_link_unique` (`link`)');
            }
        }
    }
};

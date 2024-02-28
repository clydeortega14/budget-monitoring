<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->unsignedInteger('particular_id')->after('process_id');
            $table->unsignedInteger('branch_id')->after('particular_id');
            $table->unsignedInteger('category_id')->after('branch_id');
            $table->unsignedInteger('budget_type_id')->after('category_id');
            $table->unsignedInteger('purpose_type_id')->after('budget_type_id');


            $table->foreign('particular_id')->references('id')->on('particulars');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('budget_type_id')->references('id')->on('budget_types');
            $table->foreign('purpose_type_id')->references('id')->on('purpose_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->dropForeign(['particular_id']);
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['budget_type_id']);
            $table->dropForeign(['purpose_type_id']);


            $table->dropColumn(['particular_id']);
            $table->dropColumn(['branch_id']);
            $table->dropColumn(['category_id']);
            $table->dropColumn(['budget_type_id']);
            $table->dropColumn(['purpose_type_id']);
        });
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->datetime('deleted_at')->nullable()->change();
            $table->integer('role_id')->unsigned()->change();
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');
        });
        Schema::table('role_menus', function (Blueprint $table) {
            $table->datetime('deleted_at')->nullable()->change();
            $table->integer('role_id')->unsigned()->change();
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

            $table->integer('menu_id')->unsigned()->change();
            $table->foreign('menu_id')
                ->references('id')->on('menus')
                ->onDelete('cascade');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->datetime('deleted_at')->nullable()->change();
            
        });
        Schema::table('menus', function (Blueprint $table) {
            $table->datetime('deleted_at')->nullable()->change();
            
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade');
        });

        Schema::table('purchase_items', function (Blueprint $table) {
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');

            $table->foreign('purchase_id')
                ->references('id')->on('purchases')
                ->onDelete('cascade');
        });

        Schema::table('mutations', function (Blueprint $table) {
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');

            $table->foreign('employee_id')
                ->references('id')->on('employees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->change();
            $table->dropForeign(['role_id']);
        });

        Schema::table('role_menus', function (Blueprint $table) {
            $table->integer('role_id')->change();
            $table->integer('menu_id')->change();
            $table->dropForeign(['role_id','menu_id']);
        });

        Schema::table('items', function (Blueprint $table) {
            $table->integer('category_id')->change();
            $table->dropForeign(['category_id']);

            $table->integer('brand_id')->change();
            $table->dropForeign(['brand_id']);
        });

        Schema::table('puchase_items', function (Blueprint $table) {
            $table->integer('item_id')->change();
            $table->dropForeign(['item_id']);

            $table->integer('purchase_id')->change();
            $table->dropForeign(['purchase_id']);
        });

        Schema::table('mutations', function (Blueprint $table) {
            $table->integer('item_id')->change();
            $table->dropForeign(['item_id']);

            $table->integer('employee_id')->change();
            $table->dropForeign(['employee_id']);
        });
    }
}

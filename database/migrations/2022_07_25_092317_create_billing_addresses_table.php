<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingAddressesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('billing_addresses', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id');
      
      $table->string('compony_name')->nullable();
      $table->string('email')->nullable();
      $table->string('title')->nullable();
      $table->string('first_name');
      $table->string('middle_name');
      $table->string('last_name')->nullable();
      $table->text('address1')->nullable();
      $table->text('address2')->nullable();
      $table->string('zip_code')->nullable();
      $table->string('country')->nullable();
      $table->string('state')->nullable();
      $table->string('phone')->nullable();
      $table->string('mobile')->nullable();
      $table->text('optional_address')->nullable();
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
    Schema::dropIfExists('billing_addresses');
  }
}

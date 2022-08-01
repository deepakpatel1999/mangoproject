<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingAddressUstorasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('billing_address_ustoras', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id');
      $table->string('compony_name')->nullable();
      $table->string('email')->nullable();
      $table->string('first_name')->nullable();
      $table->string('last_name')->nullable();
      $table->string('phone')->nullable();
      $table->text('address1')->nullable();
      $table->text('address2')->nullable();
      $table->string('country')->nullable();
      $table->string('state')->nullable();
      $table->string('city')->nullable();
      $table->string('zip_code')->nullable();


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
    Schema::dropIfExists('billing_address_ustoras');
  }
}

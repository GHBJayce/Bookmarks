<?php

use App\Models\PasswordResets;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePasswordResetsTable extends BaseMigration
{

    /**
     * CreatePasswordResetsTable constructor.
     */
    public function __construct()
    {
        $model = new PasswordResets();
        $this->table = $model->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}

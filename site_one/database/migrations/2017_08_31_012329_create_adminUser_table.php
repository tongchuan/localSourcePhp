<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::drop('admin_user');
        Schema::create('admin_users',function(Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('email',50)->unique();
            $table->string('password');
            $table->string('phone');
            $table->dateTime('addTime'); 
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
        Schema::dropIfExists('admin_users');
    }
}

// php artisan make:model --migration Model/Posts  
// php artisan make:model --migration Model/Users  
// php artisan  migrate  
// composer dumpautoload  
// php artisan db:seed // 执行所有  
// php artisan db:seed --class=UsersTableSeeder // 单独执行一个  

// $table->bigIncrements('id');    自增ID，类型为bigint
// $table->bigInteger('votes');    等同于数据库中的BIGINT类型
// $table->binary('data'); 等同于数据库中的BLOB类型
// $table->boolean('confirmed');   等同于数据库中的BOOLEAN类型
// $table->char('name', 4);    等同于数据库中的CHAR类型
// $table->date('created_at'); 等同于数据库中的DATE类型
// $table->dateTime('created_at'); 等同于数据库中的DATETIME类型
// $table->dateTimeTz('created_at');   等同于数据库中的DATETIME类型（带时区）
// $table->decimal('amount', 5, 2);    等同于数据库中的DECIMAL类型，带一个精度和范围
// $table->double('column', 15, 8);    等同于数据库中的DOUBLE类型，带精度, 总共15位数字，小数点后8位.
// $table->enum('choices', ['foo', 'bar']);    等同于数据库中的 ENUM类型
// $table->float('amount');    等同于数据库中的 FLOAT 类型
// $table->increments('id');   数据库主键自增ID
// $table->integer('votes');   等同于数据库中的 INTEGER 类型
// $table->ipAddress('visitor');   等同于数据库中的 IP 地址
// $table->json('options');    等同于数据库中的 JSON 类型
// $table->jsonb('options');   等同于数据库中的 JSONB 类型
// $table->longText('description');    等同于数据库中的 LONGTEXT 类型
// $table->macAddress('device');   等同于数据库中的 MAC 地址
// $table->mediumIncrements('id'); 自增ID，类型为无符号的mediumint
// $table->mediumInteger('numbers');   等同于数据库中的 MEDIUMINT类型
// $table->mediumText('description');  等同于数据库中的 MEDIUMTEXT类型
// $table->morphs('taggable'); 添加一个 INTEGER类型的 taggable_id 列和一个 STRING类型的 taggable_type列
// $table->nullableTimestamps();   和 timestamps()一样但允许 NULL值.
// $table->rememberToken();    添加一个 remember_token 列： VARCHAR(100) NULL.
// $table->smallIncrements('id');  自增ID，类型为无符号的smallint
// $table->smallInteger('votes');  等同于数据库中的 SMALLINT 类型
// $table->softDeletes();  新增一个 deleted_at 列 用于软删除.
// $table->string('email');    等同于数据库中的 VARCHAR 列  .
// $table->string('name', 100);    等同于数据库中的 VARCHAR，带一个长度
// $table->text('description');    等同于数据库中的 TEXT 类型
// $table->time('sunrise');    等同于数据库中的 TIME类型
// $table->timeTz('sunrise');  等同于数据库中的 TIME 类型（带时区）
// $table->tinyInteger('numbers'); 等同于数据库中的 TINYINT 类型
// $table->timestamp('added_on');  等同于数据库中的 TIMESTAMP 类型
// $table->timestampTz('added_on');    等同于数据库中的 TIMESTAMP 类型（带时区）
// $table->timestamps();   添加 created_at 和 updated_at列
// $table->timestampsTz(); 添加 created_at 和 updated_at列（带时区）
// $table->unsignedBigInteger('votes');    等同于数据库中无符号的 BIGINT 类型
// $table->unsignedInteger('votes');   等同于数据库中无符号的 INT 类型
// $table->unsignedMediumInteger('votes'); 等同于数据库中无符号的 MEDIUMINT 类型
// $table->unsignedSmallInteger('votes');  等同于数据库中无符号的 SMALLINT 类型
// $table->unsignedTinyInteger('votes');   等同于数据库中无符号的 TINYINT 类型
// $table->uuid('id'); 等同于数据库的UUID
// 非空、默认值等修改操作看这里 http://laravelacademy.org/post/6171.html#ipt_kb_toc_6171_10

// 修改器 描述
// ->after('column')   将该列置于另一个列之后 (仅适用于MySQL)
// ->comment('my comment') 添加注释信息
// ->default($value)   指定列的默认值
// ->first()   将该列置为表中第一个列 (仅适用于MySQL)
// ->nullable()    允许该列的值为NULL
// ->storedAs($expression) 创建一个存储生成列（只支持MySQL）
// ->unsigned()    设置 integer 列为 UNSIGNED
// ->virtualAs($expression)    创建一个虚拟生成列（只支持MySQL）
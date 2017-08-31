<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();  
	    $this->call(AdminUsersTableSeeder::class);  
	    $this->call(PostsTableSeeder::class);  
	    Model::reguard();  
        // $this->call(UsersTableSeeder::class);
    }
}


class PostsTableSeeder extends Seeder  
{  
  public function run(){  
    App\Model\Posts::truncate();  
    factory(App\Model\Posts::class,10)->create();  
  }  
}  
class AdminUsersTableSeeder extends Seeder  
{  
  public function run(){  
    App\Model\AdminUsers::truncate();  
    factory(App\Model\AdminUsers::class)->create();  
  }  
}  
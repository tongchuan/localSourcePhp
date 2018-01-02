<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Model\AdminUsers::class, function (Faker\Generator $faker) {  
      $admin=DB::table('admin_users')->where('name','admin')->exists();  
        if(!$admin){  
            $create_at=$faker->dateTimeBetween('-1 month','+3 days');  
              return [  
               'name' => 'admin',  
               'email' => 'admin@gmail.com',  
               'password' => bcrypt('admin'),   
               'addTime' => new DateTime(),
               'phone' => '13522767359',
                // 'created_at'=> $create_at,  
                // 'updated_at'=> $create_at,  
            ];   
        }  
    
});  

$factory->define(App\Model\Posts::class, function (Faker\Generator  $faker) {    
        $admin=DB::table('admin_users')->where('name','admin')->first();   
        if($admin){  
            $id=$admin->id;  
            $published_at=$faker->dateTimeBetween('-1 month','+3 days');  
            $create_at=$faker->dateTimeBetween('-1 month',$published_at);  
             return [  
                'title' => $faker->sentence(mt_rand(3,10)),   
                'uid' => $id,  
                'catalogue'=>1,  
                'subject' => mt_rand().'subject', //join('\n\n',$faker->paragraphs(mt_rand(3,6))),  
                'created_at'=> $create_at,  
                'updated_at'=> $create_at,  
                // 'published_at' => $published_at  
            ];  
        }else{  
            return [];  
        }   
}); 
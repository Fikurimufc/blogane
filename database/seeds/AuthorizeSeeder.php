<?php

use Illuminate\Database\Seeder;

class AuthorizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = [
        "slug" => "admin",
        "name" => "Admin",
        "permissions" => [
        "admin" => true
        ]
       ];
       Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();
       $adminrole = Sentinel::findRoleByName('Admin');
       $user_admin = ["first_name"=>"admin", "last_name"=>"admin", "email"=>"admin@mail.com", "password"=>"1234567"];
       $adminuser = Sentinel::registerAndActivate($user_admin);
       $adminuser->roles()->attach($adminrole);

       $role_writer = [
       	"slug" => "writer",
          "name" => "Writer",
          "permissions" => [
              "articles.index" => true,
              "articles.create" => true,
              "articles.store" => true,
              "articles.show" => true,
              "articles.edit" => true,
              "articles.update" => true
          ]
       ];
       Sentinel::getRoleRepository()->createModel()->fill($role_writer)->save();
       $writerrole  = Sentinel::findRoleByName('writer');
       $user_writer = ["first_name"=>"ane", "last_name"=>"fikuri", "email"=>"ane@mail.com", "password"=>"1234567"];
       $writeruser = Sentinel::registerAndActivate($user_writer);
       $writeruser->roles()->attach($writerrole);
    }
}

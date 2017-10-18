<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'domoved',
            'email'=>'domoved@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        DB::table('infopage')->insert([
            'title'=>'Контакты | СК Домовед',
            'name'=>'Контакты',
            'url'=>'contacts',
            'text'=>'Информации пока нет:(',

        ]);
        DB::table('infopage')->insert([
            'title'=>'Порядок оказания услуг | СК Домовед',
            'name'=>'Порядок оказания услуг',
            'url'=>'procedure-provision-serv',
            'text'=>'Информации пока нет:(',

        ]);
        DB::table('infopage')->insert([
            'title'=>'О компании | СК Домовед',
            'name'=>'О компании',
            'url'=>'aboutcompany',
            'text'=>'Информации пока нет:(',

        ]);

    }
}

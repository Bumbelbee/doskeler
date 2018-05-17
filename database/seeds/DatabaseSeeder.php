<?php

use Illuminate\Database\Seeder;
use App\Models\Hobby;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communities')->insert([
            'title' => 'hello',
            'description' => 'test',
            'creator' => 'kurmanaliev',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        $hobbies = ["Читать","Смотреть ТВ","Время с семьей","Ходить в кино","Рыбачить","Компьютер","Работать в саду","Гулять","Слушать музыку","Охотится","Заниматься спортом","Шоппиться","Путешествовать","Спать","Общаться","Отдыхать","Домашняя работа","Crafts","Смотреть спорт","Кататься на велосипеде","Играть в карты","Катать на лыжах","Готовить","Объедаться","Плавать","Ходить в походы","Ченить машину","Писать","Кататься на мотоцикле","Заботится о животных","Боулинг","Рисовать","Бегать","Плавать","Кататься на лошади","Теннис","Театр","Волонтёрская работа"];


        foreach ($hobbies as $hobby){
            Hobby::create([
                'name' => $hobby
            ]);
        }


    }
}

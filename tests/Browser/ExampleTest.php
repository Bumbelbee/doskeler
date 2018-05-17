<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
            //login page
            ->visit('/')->pause(1500)->assertSee('Находи друзей с помощью doskeler!')->value('#email','kairat@mail.ru')
            ->value('#password','123123')->pause(4000)->press('Войти')->assertPathIs('/home')
            //home page
            ->assertSee('kairat')
            ->pause(2000)->value('#textarea','Запущен Тест на проверку')->press('Пост!')->pause(3000)
            ->value('#comment1','test comment!!')->press('#comment2')
            ->pause(5000)
            //community page
            ->visit('/community')->assertSee('Создать Сообщество')->press('#create')->pause(1500)->value('#title','TestCommunity')
            ->value('#desc','about test')->press('#save')->pause(3000)
            // chat page
            ->visit('/direct-messages')->pause(3000)->value('#area','Hi my friend')
            ->keys('#area','{enter}')
            ->pause(4000);
            
        });
    }
}

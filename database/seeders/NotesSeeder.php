<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('notes')->insert($this->getDate());
    }

    protected function getDate(): array
    {
        $data[] = [
            'title' => 'Руководство',
            'content' => '
<p><big><strong>Руководство для Администратора новостного веб-сайта News Aggregator&nbsp;&nbsp; l&nbsp;&nbsp;&nbsp; Developer: Ackap Maemgenov</strong></big></p>
<hr />
<ul>
	<li><big><strong>Панель управление:</strong></big></li>
</ul>
<p>Здесь можно добавлять/редактировать/удалять&nbsp;RSS URL ссылки для Parser новостей&nbsp;(по дефолту когда создаете БД, так же создаются примерные RSS ресурсы Рамблер)&nbsp;после того как вы сформировали нужные ресурсы можно добавлять в очереди. Очереди можно запускать в фоновом режиме или запустить и после выполнения перестанет функционировать. Также ниже есть две таблицы для мониторинга очередей(Job), те которые в очереди и не выполненные операции в очереди(Failed Job).&nbsp;</p>
<p><span class="marker"><strong>Обязательно!</strong></span> При формировании RSS ссылки в конце не должно быть ни каких символов(включая слэш &quot;/&quot;), в содержание RSS ресурса обязательно должны быть параметры ниже:</p>
<p><kbd><small><samp>1. channel.title&nbsp; &nbsp;</samp></small></kbd><kbd><small><samp>2. channel.description&nbsp; &nbsp;</samp></small></kbd><kbd><small><samp>3. channel.link&nbsp; &nbsp;</samp></small></kbd><kbd><small><samp>4. channel.image.url&nbsp; &nbsp;</samp></small></kbd><kbd><small><samp>5. channel.item[category,title,author,description,link,pubDate]</samp></small></kbd></p>
<hr />
<ul>
	<li>
	<p><big><strong><samp>Категорий:</samp></strong></big></p>
	</li>
</ul>
<p>В разделе категорий можно Создать/Редактировать/Удалить&nbsp; категорию, так же в ней отображаются все категорий которые хранятся&nbsp;в БД.&nbsp;</p>
<p><span class="marker"><strong>Осторожно!</strong></span> При удалении какой-либо категории, если она связана с новостью, в этом случай связанные новости также удаляться каскадно.</p>
<hr />
<ul>
	<li><big><strong><samp>Новости:</samp></strong></big></li>
</ul>
<p>В разделе новости можно Создать/Редактировать/Удалить&nbsp; новость, так же в ней отображаются все новости которые хранятся&nbsp;в БД.&nbsp;</p>
<p><span class="marker"><strong>Внимание!</strong></span> При создании или редактирование новостей, если статус будет&nbsp;BLOCKED, новость не будет отображаться на странице просмотра новостей для пользователей и гостей.</p>
<hr />
<ul>
	<li><big><strong><samp>Пользователи:</samp></strong></big></li>
</ul>
<p>В разделе пользователей отображаются все пользователи зарегистрированных на сервере News Aggregator. Здесь можно смотреть полную информацию о пользователе, также можно давать права Администратора на веб-сайте. Также можно удалить аккаунт пользователя!</p>
<hr />
<p><span class="marker"><strong>Снизу есть раздел заметок которые отображаются и доступны всем администратором сайта NewsAggregator.&nbsp;</strong></span></p>
<p><span class="marker"><strong><tt>Можно смотреть/добавлять/редактировать/удалять заметки.</tt></strong></span></p>
<hr />
<blockquote>
<p><big><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Руководство подготовил: Аскар Маемгенов.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="https://github.com/ackapga" target="_blank">Ссылка на GitHub&nbsp;</a></strong></big></p>
</blockquote >
            ',
            'created_at' => '2023-01-10 00:00'
        ];

        return $data;
    }
}

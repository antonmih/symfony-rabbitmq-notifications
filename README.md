<h1>Symfony rabbitmq notifications</h1>
<hr>
<h3>Запуск</h3>
<b>Для запуска используем команду:</b>
<pre>task start</pre>
<hr>
<h3>Использую</h3>
<li>Symfony 5.4</li>
<li>Php 8</li>
<li>PostgreSQL</li>
<li>RabbitMQ</li>
<li>EasyAdmin</li>
<li>Psalm</li>
<li>Codeception</li>
<li>Docker</li>
<li>DDD архитектура</li>
<hr>
<h3>О проекте</h3>
<p>
Сервис принимает сообщения по API, ставит их в очередь через rabbitmq, после
записывает их в базу. Сообщения можно посмотреть через админ панель (EasyAdmin). После через cron происходит рассылка сообщений в нужные источники.
</p>
<hr>
<h3>Планы</h3>
<li>Доделать Email рассылку</li>
<li>Сделать интеграцию с telegram</li>
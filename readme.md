## ТЗ
В этом тестовом задании Вам нужно разработать онлайн каталог сотрудников для
компании с более чем 50,000 сотрудников.

## Часть №1 (обязательная)
Создайте веб страницу, которая будет выводить иерархию сотрудников в древовидной форме.
- Информация о каждом сотруднике должна храниться в базе данных и содержать следующие данные:
  - ФИО;
  - Должность;
  - Дата приема на работу;
  - Размер заработной платы;
- У каждого сотрудника есть 1 начальник;
- База данных должна содержать не менее 50 000 сотрудников и 5 уровней
иерархий.
- Не забудьте отобразить должность сотрудника.

## Часть №2 (опциональная)
1. Создайте базу данных используя миграции Laravel / Symfony.
2. Используйте Laravel / Symfony seeder для заполнения базы данных.
3. Используйте Twitter Bootstrap для создания базовых стилей Вашей страницы.
4. Создайте еще одну страницу и выведите на ней список сотрудников со всей
имеющейся о сотруднике информацией из базы данных и возможностью сортировать по любому полю.
5. Добавьте возможность поиска сотрудников по любому полю для страницы созданной в задаче 4.
6. Добавьте возможность сортировать (и искать если Вы выполнили задачу No5) по любому полю без перезагрузки страницы, например используя ajax.
7. Используя стандартные функции Laravel / Symfony, осуществите аутентификацию пользователя для раздела веб сайта доступного только для
зарегистрированных пользователей.
8. Перенесите функционал разработанный в задачах 4, 5 и 6 (используя ajax запросы) в раздел доступный только для зарегистрированных пользователей.
9. В разделе доступном только для зарегистрированных пользователей, реализуйте остальные CRUD операции для записей сотрудников. Пожалуйста заметьте, что все поля касающиеся пользователей должны быть редактируемыми, включая начальника каждого сотрудника.
10. Осуществите возможность загружать фотографию сотрудника и отобразите ее на странице, где можно редактировать данные о сотрудник. Добавьте дополнительную колонку с уменьшенной фотографией сотрудника на странице списка всех сотрудников.
11. Осуществите возможность перераспределения сотрудников в случае изменения начальника (бонусом может быть то, что вы сможете это
осуществить с применением встроенных механизмов/парадигм, предлагаемых Laravel / Symfony ORM).
12. Реализуйте ленивую загрузку для дерева сотрудников. Например, показывайте первые два уровня иерархии по умолчанию и подгружайте 2 следующих уровня или всю ветку дерева при клике на сотрудника второго уровня.
13. Реализуйте возможность менять начальника сотрудника используя drag-n-drop сразу в дереве сотрудников.
14. Создайте структуру базы данных используя MySQL Workbench (не забудьте закомитить проект MySQL Workbench в git) и сгенерируйте файл(ы) миграций с помощью Laravel / Symfony из существующей БД MySQL, или прямо из файла проекта MySQL Workbench.

## В работе использовались:
- Laravel 5.4;
- MySQL, MySQL Workbench;
- PHP 7.0;
- Bootstrap 3;
- JQuery, JQuery UI;
- Ajax;
- Composer;
- Bower;
- Datatables;
- Laravel Collective;
- Faker.

##
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

=== Buy one click WooCommerce ===
Contributors: northmule
Donate link: https://www.paypal.me/coderunru
Tags: woocommerce, ecommerce, mode catalog, buy one click
Requires at least: 5.0
Tested up to: 5.4
Stable tag: 5.4
Requires PHP: 7.0
WC requires at least: 3.9
WC tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

 		
== Description ==

The plugin adds a buy button in one click to your WooCommerce

This is the best solution for Woocommers to easily add a quick order button to the site.

= Some advantages of the plugin: =
* You only need Woocommere
* Several modes of operation
* Several styles for the form directly from the plugin settings
* Ability to customize styles for yourself
* Wide range of settings
* The button can be added to the item card and to the category
* Shortcode to install the button anywhere WordPress

= Support = 

* [Telegram Group @coderunphp](https://t.me/coderunphp)

* [On the plugin page](http://www.zixn.ru/plagin-zakazat-v-odin-klik-dlya-woocommerce.html)

* [Premium Support Forum](https://coderun.ru/support/forum/voprosy-po-rabote-plagina-woocommerce/) 

= Other add-ons for =

[Variable goods](https://coderun.ru/product/buy-one-click-woocommerce-variativnye-tovary/?utm_source=plugin_portal)

[Marketplace for developers](https://coderun.ru/?utm_source=plugin_portal)

[Telegram order notifications](https://coderun.ru/product/woocommerce-uvedomleniya-o-novykh-zakazakh-v-telegram/?utm_source=plugin_portal)

= Required Plugins =
* [WooCommerce](https://wordpress.org/plugins/woocommerce/)

= Bundled translations: =
* Russian
* English

= Donate link: =
<a href="https://money.yandex.ru/to/41001746944171" target="_blank">Visa / MasterCard / Mir / YandexMoney</a>
<a href="https://www.paypal.me/coderunru">PayPal</a>

== Installation ==

1. Make sure you have the latest version of the plugin installed. [WooCommerce](http://www.woothemes.com/woocommerce)
2. Unpack the archive and download the "buy-one-click-woocommerce" folder in your-domain / wp-content / plugins
3. Activate the plugin
4. Go to the menu item "WooCommerce" - "BuyOneClick" to configure the add-on

== Screenshots ==

1. Button on the site.
2. Order form.
3. Settings add-on.
4. Orders.
5. Sample Orders with Supplement for Variable Items.
6. An example of an added product with the option to add to WooCommerce


== Changelog ==
= 1.10.5 =
* Фикс двух кнопок при включенном режиме "Управление запасами" в товаре (фикс от @pluzhnov)
* Фикс js, кнопка не сработает если Woo пометил её как disabled
= 1.10.4 =
* Фикс бага предыдущего обновления(отображение нескольких кнопок в карточке)
= 1.10.3 =
* Фикс бага предыдущего обновления. Фикс от пользователя Telegram - BiJey
= 1.10.2 =
* Добавлено положение кнопки для товаров которых нет на складе и для основной кнопки включена опция "woocommerce_after_add_to_cart_button"

= 1.10.1 =
* Мелкие правки багов
* Добавлен новый хук buy_click_save_order_to_table
* История заказов плагина храниться в отдельной таблице (старое место хранения больше не используется)
* Старые заказы не будут видны в истории плагина

= 1.9.13 =
* Фикс кнопки, когда включен режим управления запасами

= 1.9.12 =
* Улучшена совместимость формы с мобильными устройствами
* Оптимизированны css файлы шаблонов


= 1.9.11 =
* fix с пересчётом цены

= 1.9.10 =
* Журнал заказов плагина связон с номером заказа Woo
* Можно удалить заказ Woo из журнала плагина
* Небольшие исправления кода

= 1.9.9 =
* Проверка на спам при помощи капчи. Зависит от плагина "Advanced noCaptcha & invisible Captcha (v2 & v3)"
* Новая настройка для включения\отключения использования капчи


= 1.9.8 =
* Оптимизация кода
* Добавлено поле nonce

= 1.9.7 =
* fix указания текущего пользователя в заказе woocommerce

= 1.9.6 =
* Исправлена опция "Редирект" после отправки формы
* Мелкая реоргиназация кода в сторону оптимизации

= 1.9.5 =
* Инициализация плагина теперь на событии wp, ранее было init

= 1.9.4 =
* Добавлена возможность отправки файлов через форму
* Улучшена читаемость кода
* Улучшена производительность кода
* Добавлены новые положения кнопок
* Добавлены хуки для фильтрации некоторых данных
* Улучшена совместимость с дополнением для вариативных товаров

= 1.9.3 =
* Оптимизация кода
* Уменьшенно количество запросов к БД
* Начат переход на новую структуру плагина
* Улучшена совместимость с дополнением для вариативных товаров

= 1.9.2 =
* Добавлен спинер на кнопку. При нажатии на кнопку будет работать "крутилка". Реализация на основе loading.io

= 1.9.1 =
* Исправлены некоторые ошибки

= 1.9 =
* Добавлена возможность перевода плагина на другие языки
* Исправлены мелкие ошибки
* Добавлена "галка" Согласие в форму заказа. Включается в настройках

= 1.8.9 =
* +1 стиль формы для соответствия с вашей темой WordPress
* +1 позиция кнопки
= 1.8.8 =
* Формат ввода номера телефона [jQuery Masked Input Plugin](https://github.com/digitalBush/jquery.maskedinput)
* Удалён собственный css класс стилей кнопки(теперь используются стили вашего шаблона)
* Новая опция для связи плагина с "запасами" товара Woo
* Два режима работы плагина (добавление в корзину и класическая кнопка)
* Можно модифицировать CSS, для этого нужно в папке вашей темы создать папку buy-one-click-woocommerce и в неё скопировать файлы из папки плагина templates/
* fix формы - спасибо пользователю [VladChV](https://zixn.ru/plagin-zakazat-v-odin-klik-dlya-woocommerce.html/comment-page-12#comment-54975)
= 1.8.6 =
* fix формы
* fix шорткода
* disabled button - при отправке формы и до ответа сервера
= 1.8.5 =
* Добавлен лимит на отправку формы, чаще чем N секунд форму отправить не получится
* Добавлена настройка управления лимитом и сообщением для лимита
= 1.8.4 =
* fix bug
= 1.8.3 =
* Email поле теперь приходит в письме
* Проверка обязательных полей на стороне php
= 1.8.2 =
* Возможность СМС уведомлений продавца магазина
* Добавлен ХУК "buy_click_new_order". Описание доступно на странице настроек плагина
= 1.8 =
* 500 - ошибка сервера при отправке формы
= 1.7 =
* Мелкие ошибки в работе плагина
= 1.6 =
* Исправлены мелкие ошибки в работе плагина
* Подготовка плагина к работе с вариациями
* Поле "дополнительно" из формы - теперь приходит в шаблон письма
= 1.5.1 = 
* Исправление мелких ошибок
* Добавлены варианты шаблонов модального окна в настройках
= 1.5 = 
* Исправление мелких ошибок
* Добавлен новый шорткод и настройка
* В целом старый добрый функционал не затронут для совместимости
= 1.4.1 =
* Улучшена работа кнопки в карточке товара в случаях когда под карточкой товара есть карусель похожих товаров
* Добавлен свой обработчик в head для обработки ajax
= 1.4 =
* Новая опция вывода кнопки купить в категории товара
* Некоторые переработки функций
* Появилась возможность вывести кнопку при помощи шорткода
= 1.3.1 =
* Подстановка ajax адреса
= 1.3 =
* Вызов формы для быстрого заказа теперь происходит по ajax, т.е она не присутствует в коде страницы сразу после загрузки, это не засоряет DOM дерево страницы
* Адрес ajax обработчика теперь берётся из вашего сайта (ранее было жёстко заданно)
* Новая опция, теперь заказы могут записываться в общую таблицу Woo. В таблицу плагина они будут попадать всегда
* Обновлена информационная вкладка "Автор"
= 1.2 =
* Добавлена поддержка СМС
= 1.1 =
* Исправлены некоторые ошибки в работе плагина
* Добавлена опция включения/отключения показа кнопки
* Добавлены опции «обязательные поля»
* Добавлены варианты поведения формы при отправке заказа
* В Шаблон email сообщения добавлены ФИО и Телефон клиента
= 1.0 =
* Релиз


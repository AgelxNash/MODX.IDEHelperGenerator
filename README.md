Generator IDE Helper for MODX Evolution
=========
IDE Helper это файл помощник для IDE PhpStorm, SblimeText 2 и возможно других динамических IDE. 

На создание файла вдохновил генератор под [Laravel 4](https://github.com/jonphipps/laravel4-idehelper-generator). Но т.к. исходный код MODX Evolution по большому счету - говно, было решено пойти путем создания псевдоклассов. Так, как это реализовал [andrew13](https://github.com/andrew13) в демоприложении [Laravel 4 Bootstrap Starter Site](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/blob/master/_ide_helper.php)

Учитывая тот факт, что API MODX Evolution может отличаться от версии к версии *(особенно если мы говорим про [ClipperCMS](https://github.com/ClipperCMS/ClipperCMS))*, то необходим инструмент поддерживающий кастомизацию автоматически создаваемого IDE Helper файла на лету, в зависимости от версии MODX для которой этот файл создается.

* [Демонстрация работы с IDE Helper'ом](http://www.youtube.com/watch?v=HowzMZlFVsQ)
Generator IDE Helper for MODX Evolution
=========
IDE Helper это файл помощник для IDE PhpStorm, SblimeText 2 и возможно других динамических IDE. 

На создание файла вдохновил генератор под [Laravel 4](https://github.com/jonphipps/laravel4-idehelper-generator). Но т.к. исходный код MODX Evolution по большому счету - говно, было решено пойти путем создания псевдоклассов. Так, как это реализовал [andrew13](https://github.com/andrew13) в демоприложении [Laravel 4 Bootstrap Starter Site](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/blob/master/_ide_helper.php)

Учитывая тот факт, что API MODX Evolution может отличаться от версии к версии *(особенно если мы говорим про [ClipperCMS](https://github.com/ClipperCMS/ClipperCMS))*, то необходим инструмент поддерживающий кастомизацию автоматически создаваемого IDE Helper файла на лету, в зависимости от версии MODX для которой этот файл создается.

Более того, автоматическая генерация хелпера не возможна, т.к. MODX даже последней версии на текущий момент не имеет карты классов и инструмента для автозагрузки. Конечно, IDE Helper для Revolution создается в полуавтоматическом режиме - вначале принудительно загружаются обязательные классы, а потом уже запускается сканирование папок и файлов в них. Но сканирование пока тоже далеко от идеального - в хелпер попадут только те классы, которые располагаются в файлах названных по шаблону *.class.php

### На заметку
---------
* Генератор использует автозагрузчик composer'a и зависит от пакета [phpdocumentor/reflection](https://github.com/phpdocumentor/reflection)
* По умолчанию хелперы содержат только классы ядра. Если вы довольно часто работаете с какой-то специфичной библиотекой *(допустим это [DocLister](https://github.com/AgelxNash/DocLister), [MODxAPI](https://github.com/AgelxNash/resourse) для Evo или же это компонент типа [pdoTools](https://github.com/bezumkin/pdoTools) под Revolution)*, то можете доработать кофинги в [папке classmap](https://github.com/AgelxNash/MODXEvo.IDEHelper/tree/master/classmap) под свои нужды

### Полезные ссылки
---------
* [Демонстрация работы с IDE Helper'ом](http://www.youtube.com/watch?v=rg_EzIAxyew)

### Автор
---------
<table>
  <tr>
    <td><img src="http://www.gravatar.com/avatar/bf12d44182c98288015f65c9861903aa?s=220"></td>
	<td valign="top">
		<h4>Борисов Евгений
			<br />
			Agel Nash
		</h4>
		<a href="http://artdevue.com">http://agel-nash.ru</a><br />
		<br />
		<strong>ICQ</strong>: 8608196<br />
		<strong>Skype</strong>: agel.nash<br />
		<strong>Email</strong>: agel_nash@xaker.ru
	</td>
	<td valign="top">
		<h4>Реквизиты для доната<br /><br /></h4>
		<br />
		<strong>WMZ</strong>: Z762708026453<br />
		<strong>WMR</strong>: R203864025267<br />
		<strong>ЯД</strong>: 41001299480137<br />
		<strong>PayPal</strong>: agel_nash@xaker.ru<br />
	</td>
  </tr>
</table>
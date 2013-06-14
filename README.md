Internationalisation with FINE
==============================

Fine is a PHP internationalisation package. It will help you develop applications that support several languages.
FINE means: Fine is not English :).

Translation is performed using PHP mapping files, but Fine is a [Mouf package](http://mouf-php.com).
This means you will have a nice graphical interface inside the Mouf framework to write your own translated messages.

This package at a new functionnaloty to import and export excel file.

Installing Fine Export
----------------------

Edit your *composer.json* file, and add a dependency on *mouf/utils.i18n.fine-export*.

A minimal *composer.json* file might look like this:
```
	{
	    "require": {
	        "mouf/mouf": "~2.0",
	        "mouf/utils.i18n.fine-export": "3.0.*"
	    },
	    "autoload": {
	        "psr-0": {
	            "Test": "src/"
	        }
	    },
	    "minimum-stability": "dev"
	}
```
As explained above, Fine is a package of the Mouf framework. Mouf allows you (amoung other things) to visualy "build" your project's dependencies and instances.

Export file
-----------

Select the Export Excel in HTML -> Fine.
![FINE export](https://raw.github.com/thecodingmachine/utils.i18n.fine-export/3.0/doc/images/export.png)

Open the Excel file
![FINE export excel](https://raw.github.com/thecodingmachine/utils.i18n.fine-export/3.0/doc/images/export_excel.png)

Import file
-----------
Select the Import Excel in HTML -> Fine.
![FINE export](https://raw.github.com/thecodingmachine/utils.i18n.fine-export/3.0/doc/images/import.png)

You could import an Excel File into Fine. You must respect the export architecture. In first line is code language. In first line is Fine key. It's possible to add new key dynamically in the file but not a language.
![FINE import excel](https://raw.github.com/thecodingmachine/utils.i18n.fine-export/3.0/doc/images/import_excel.png)

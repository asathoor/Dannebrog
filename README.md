Dannebrog ( WordPress Plugin )
==============================

## Display a Flag on Your Website

The purpose of this plugin is to display the Danish flag - or any other flag or symbol you fancy - on a web page on national holidays or personal occations. 


## How to display your flag on WordPress

You can modify the code, and display the flag on birthsdays and similar. The plugin will add a widget. Add the widget to relevant widget areas in WordPress.

## If you enjoy this plugin

Please let me know where it is used. Add a comment under issues.

## Troubleshooting

If you get an error from the easterdate function, try to enable calendar in /etc/php/php.ini (I use Arch Linux, in other distros the position of this file may be somewhere else):

~~~~
// Change this line
;extension=calendar

// to this:
extension=calendar
~~~~

Then restart Apache:

~~~~
sudo sudo apachectl -k restart
~~~~

## Install

1. Download the zip.
2. In Dashboard > Plugins > Add new
3. Upload the zip file via Plugins > Add New
4. Activate.

## New in version 2.1 ( March 2020 )

* Added style.css
* Code developed in WordPress 5.4 RC5
* Reason for error found


## New in version 2.0 ( February 2017 )

* Svg graphics
* Code developed in WordPress 4.7.3


## External sources

* [Flag_of_Denmark.svg &copy; Wikimedia Commons](https://commons.wikimedia.org/wiki/File%3AFlag_of_Denmark.svg)
* [Function from T.I.M.: Calculate Easter](https://thisinterestsme.com/php-easter-date/)

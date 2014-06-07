RT
==

mediawiki Extension:RT for mysql

This is a modified version of the Mediawiki Extension:RT written by Greg Sabino Mullane. The modifications enable this extension to work with RT implementations using mysql. The extension on http://www.mediawiki.org/wiki/Extension:RT only works for Postgres.


1. Clone this repository into your mediawiki extensions folder, e.g. /usr/share/mediawiki/extensions

2. Add the following lines to the bottom of  your Localsettings.php:

       ```php
       require_once "$IP/extensions/RT/RT.php";
       $wgRequestTracker_URL      = 'http://rt.example.com/Ticket/Display.html?id';
       $wgRequestTracker_DBuser   = 'rtuser';
       $wgRequestTracker_DBpasswd = 'wibble';
       $wgRequestTracker_DBhost   = 'rt.example.com';
       $wgRequestTracker_DBdbname = 'rtdb';
       ```

3. Reload apache

4. Refer to the Usage section at http://www.mediawiki.org/wiki/Extension:RT

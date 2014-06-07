<?php
/**
 * RT (Request Tracker) extension for MediaWiki
 *
 * @file
 * @ingroup Extensions
 *
 * Usage: Add the following three lines to LocalSettings.php:
 * require_once( "$IP/extensions/RT/RT.php" );
 * $wgRequestTracker_URL = 'https://rt.example.com/Ticket/Display.html?id';
 * $wgRequestTracker_DBconn = 'user=rt dbname=rt';
 *
 * For other options, please see the complete documentation
 *
 * @author Greg Sabino Mullane <greg@endpoint.com>
 * @license MIT <http://www.opensource.org/licenses/mit-license.php>
 * @link http://www.mediawiki.org/wiki/Extension:RT
 */

$rt_uri = 'http://www.mediawiki.org/wiki/Extension:RT';

# Default values: Override in LocalSettings.php, not here!
$wgRequestTracker_URL         = 'http://rt.example.com/Ticket/Display.html?id';
####$wgRequestTracker_DBconn      = 'user=rt dbname=rt';
$wgRequestTracker_Formats     = array();
$wgRequestTracker_Cachepage   = 0;
$wgRequestTracker_Useballoons = 1;
$wgRequestTracker_Active      = 1;
$wgRequestTracker_Sortable    = 1;

// added erikvw - begin
$wgRequestTracker_DBuser     = 'root';
$wgRequestTracker_DBpasswd     = 'cc3721b';
$wgRequestTracker_DBdbname      = 'rtdb';
$wgRequestTracker_DBhost      = 'rt.bhp.org.bw';
####$wgRequestTracker_DBconn      = array('rt.example.com','rtuser', 'wibble');
// added erikvw - end

# Time formatting
# Example formats:
# FMHH:MI AM FMMon DD, YYYY => 2:42 PM Jan 23, 2009
# HH:MI FMMonth DD, YYYY => 14:42 January 23, 2009
# YYYY/MM/DD => 2009/01/23
# For a more complete list of possibilities, please visit:
# http://www.postgresql.org/docs/current/interactive/functions-formatting.html
####$wgRequestTracker_TIMEFORMAT_LASTUPDATED  = 'FMHH:MI AM FMMonth DD, YYYY';
####$wgRequestTracker_TIMEFORMAT_LASTUPDATED2 = 'FMMonth DD, YYYY';
####$wgRequestTracker_TIMEFORMAT_CREATED      = 'FMHH:MI AM FMMonth DD, YYYY';
####$wgRequestTracker_TIMEFORMAT_CREATED2     = 'FMMonth DD, YYYY';
####$wgRequestTracker_TIMEFORMAT_RESOLVED     = 'FMHH:MI AM FMMonth DD, YYYY';
####$wgRequestTracker_TIMEFORMAT_RESOLVED2    = 'FMMonth DD, YYYY';
####$wgRequestTracker_TIMEFORMAT_NOW          = 'FMHH:MI AM FMMonth DD, YYYY';

// added erikvw - begin
## For a more complete list of possibilities, please visit:
##http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html#function_date-format
$wgRequestTracker_TIMEFORMAT_LASTUPDATED  = '%h:%i %p %b %D, %Y';
$wgRequestTracker_TIMEFORMAT_LASTUPDATED2 = '%D %b %Y';
$wgRequestTracker_TIMEFORMAT_CREATED      = '%h:%i %p %b %D, %Y';
$wgRequestTracker_TIMEFORMAT_CREATED2     = '%D %b %Y';
$wgRequestTracker_TIMEFORMAT_RESOLVED     = '%h:%i %p %b %D, %Y';
$wgRequestTracker_TIMEFORMAT_RESOLVED2    = '%D %b %Y';
$wgRequestTracker_TIMEFORMAT_NOW          = '%h:%i %p %b %D, %Y';
// added erikvw - end

// Ensure nothing is done unless run via MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	echo( "Please visit $rt_uri\n" );
	die( -1 );
}

// Credits for Special:Version
$wgExtensionCredits['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'RT',
	'version'        => '1.12.0',
	'author'         => array( 'Greg Sabino Mullane' ),
	'descriptionmsg' => 'rt-desc',
	'url'            => $rt_uri,
);

// Pull in the Internationalization file and class
$wgMessagesDirs['RT'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['RT'] =  dirname( __FILE__ ) . '/RT.i18n.php';
$wgAutoloadClasses['RT'] = dirname( __FILE__ ) . '/RT_body.php';

// Register hook
$wgHooks['ParserFirstCallInit'][] = 'RT::registerHook';

$rtDate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
$wgCacheEpoch = max( $wgCacheEpoch, $rtDate );

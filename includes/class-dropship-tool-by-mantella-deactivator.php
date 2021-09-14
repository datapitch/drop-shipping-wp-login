<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Dropship_Tool_By_Mantella_Deactivator
{
	public static function deactivate()
    {
		global $wpdb;
        include_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		// Delete table for License when deactivate
		$license = $wpdb->prefix . "license_key";
		$sql_license = "DROP TABLE IF EXISTS $license;";
		$wpdb->query($sql_license);
		
		// Delete table for track_order_table when deactivate
		$track_order_table = $wpdb->prefix . 'dropship_track_order_dtl';
		$sql_track_order_table = "DROP TABLE IF EXISTS $track_order_table;";
		$wpdb->query($sql_track_order_table);

		// Delete table for track_order_table when deactivate
		$track_order_tabletemp = $wpdb->prefix . 'dropship_import_cron_dtl_temp';
		$sql_track_order_tabletemp = "DROP TABLE IF EXISTS $track_order_tabletemp;";
		$wpdb->query($sql_track_order_tabletemp);
		
		// Delete table for track_order_table when deactivate
		$track_cron_table = $wpdb->prefix . 'dropship_import_cron_dtl';
		$sql_cron_table = "DROP TABLE IF EXISTS $track_cron_table;";
		$wpdb->query($sql_cron_table);
		
		// Delete table for Support when deactivate
		$support = $wpdb->prefix . "support";
		$sql_support = "DROP TABLE IF EXISTS $support;";
		$wpdb->query($sql_support);
		delete_option("my_plugin_db_version");

	}

}

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Dropship_Tool_By_Mantella_Activator
{
	public static function activate()
    {
        global $wpdb;
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        // Insert table for License when activate
        $license = $wpdb->prefix . 'license_key';
        $sql_license = "CREATE TABLE IF NOT EXISTS $license (
            id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
            license_no varchar(255) NOT NULL,
            ean_code varchar(255) DEFAULT NULL,
            stock_status varchar(5) DEFAULT NULL,
            prices_status varchar(5) DEFAULT NULL,
            categories_status varchar(5) DEFAULT NULL,
            allproduct_status varchar(5) DEFAULT NULL,
            language varchar(255) NOT NULL,
            license_status varchar(255) NOT NULL,
            total_feed INT(10) NOT NULL,
            perpage INT(10) NOT NULL,
            execution_time INT(10) NOT NULL,
            time_var INT(10) NOT NULL,
            ean_show_in_front varchar(5) DEFAULT NULL,
            brand_show_in_front varchar(5) DEFAULT NULL,
            brand_with_title_status varchar(5) DEFAULT NULL,
            product_attributes_status varchar(5) DEFAULT NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB;";
        dbDelta($sql_license);
	
        // Create table for Order status
        $tabname = $wpdb->prefix . 'dropship_track_order_dtl';
        $sql_dstrack = "CREATE TABLE IF NOT EXISTS $tabname (
            id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
            user_id int(9) NOT NULL,
            woo_order_id int(9) NOT NULL,
            ds_order_id int(9) NOT NULL,
            ds_order_data text(500) NOT NULL,
            tracking_codes text(500) NOT NULL,
            status varchar(255) NOT NULL,
            tracking_status_ds TINYINT(2) NOT NULL,
            created_on DATETIME,
            modified_on DATETIME,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB;";
        dbDelta($sql_dstrack);
	
        // Create table for cron product import status
        $tablname = $wpdb->prefix . 'dropship_import_cron_dtl';
        $sql_dsimpcron = "CREATE TABLE IF NOT EXISTS $tablname (
            id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
            page_no int(9) NOT NULL,
            created_on DATETIME,
            modified_on DATETIME,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB;";
        dbDelta($sql_dsimpcron);
	
        // Create table for cron product import status
        $tablnametemp = $wpdb->prefix . 'dropship_import_cron_dtl_temp';
        $sql_dsimpcrontemp = "CREATE TABLE IF NOT EXISTS $tablnametemp (
            id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
            page_no int(9) NOT NULL,
            created_on DATETIME,
            modified_on DATETIME,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB;";
        dbDelta($sql_dsimpcrontemp);
	
        // Create table for cron product import status
        $tablnametemp = $wpdb->prefix . 'webshop_information';
        $sql_webshop_information = "CREATE TABLE IF NOT EXISTS $tablnametemp (
            id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            description varchar(255) NOT NULL,
            status tinyint(2) NOT NULL,
            created_on DATETIME,
            modified_on DATETIME,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB;";
        dbDelta($sql_webshop_information);
	
        // Insert table for Support when activate
        $support = $wpdb->prefix . 'support';
        $sql_support = "CREATE TABLE IF NOT EXISTS $support (
            id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
            title varchar(255) NOT NULL,
            description text(500) NOT NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB;";
        dbDelta($sql_support);

	}

}

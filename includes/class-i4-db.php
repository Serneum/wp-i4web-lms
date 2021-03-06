<?php

/**
 * I4_Web_LMS customers db table
 *
 * @package I4_Web_LMS
 * @subpackage Classes/Database Table
 * @copyright Copyright (c) 2015, i-4Web
 * @since 0.0.1
 */
class I4Web_LMS_DB {

    /**
     * The name of the i-4Web LMS settings table
     *
     * @access  public
     * @since   0.0.1
     */
    public $i4_coordinators_table_name;

    /**
     * The name of our database version
     *
     * @access  public
     * @since   0.0.1
     */
    public $version;

    /**
     * The name of the primary column
     *
     * @access  public
     * @since   0.0.1
     */
    public $primary_key;

    /**
     * Class Construct to get started
     *
     * @since 0.0.1
     */
    public function __construct() {
        global $wpdb;

        $this->i4_coordinators_table_name = $wpdb->prefix . 'i4_lms_coordinators';
        $this->primary_key = 'id';
        $this->version = '1.0';

    }

    /**
     * Creates the Candidate Space Table
     *
     * @since 0.0.1
     */
    public function create_i4_coordinators_table() {
        global $wpdb;

        //Only run this for the main site in our CandidateSpace network

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE " . $this->i4_coordinators_table_name . "(
      id bigint(20) NOT NULL AUTO_INCREMENT,
      coordinator_name varchar(250) NOT NULL,
      coordinator_email varchar(100) NOT NULL,
      course_id int(11) NOT NULL,
      coordinator_img longtext NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        add_option($this->i4_coordinators_table_name . '_db_version', $this->version); //add our db version to the options table


    }


}

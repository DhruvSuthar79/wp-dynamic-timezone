<?php 

/**
 * Plugin Name: Dynamic Timezone
 * Version: 1.0.0
 * Description: This plugin will diaplay shop status just like open or closed with different color based on GMT-5 timezone.
 */

/**
 * Prevent direct access
 */

if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Timezone Shortcode for banner section
 */

function wpdev_dynamic_timezone_data_change_for_banner() {

    // America/Atikokan
    // Asia/Kolkata
    date_default_timezone_set( "America/Atikokan" );
    // date_default_timezone_set( "Asia/Kolkata" );
    echo date( "H:i:s" ) . "<br>";

    $current_time = date( "H" );
    $shop_open = "08";
    $shop_close = "18";

    if( $current_time > $shop_open && $current_time < $shop_close ) {
        echo "<p>Shop is <span style='color:green'>Open</span> now</p>";
    } else {
        echo "<p>Shop is <span style='color:red'>Closed</span> now</p>";
    }

}
add_shortcode( 'dynamic-timezone-data-banner', 'wpdev_dynamic_timezone_data_change_for_banner' );

/**
 * Timezone shortcode for footer section
 */

function wpdev_dynamic_timezone_data_change_for_footer() {

    // America/Los_Angeles
    date_default_timezone_set( "America/Atikokan" );
    // date_default_timezone_set( "America/Los_Angeles" );
    // date_default_timezone_set( "Asia/Kolkata" );

    $current_time = date( "H" );
    $day = strtolower(date('l'));
    $shop_open = "08";
    $shop_close = "18";
    $saturday_time = "09";
    $data = "";
    echo $day;

    ?>
    <div class="hours-section">
        <div class="var">

        <?php
            if( $current_time > $shop_open && $current_time < $shop_close ) { ?>
                <b><span class="days" style="color:green">Mon-Fri</span></b><br>
                <b><span class="time" style="color:green">8:00AM - 6:00PM</span></b>
            <?php } else { ?>
                <b><span class="days" style="color:red">Mon-Fri</span></b><br>
                <b><span class="time" style="color:red">8:00AM - 6:00PM</span></b>
            <?php }
        ?>

        </div>
        <div class="var">

        <?php
            if( $day == 'saturday' && $current_time >= $saturday_time && $current_time <= $shop_close ) { ?>
                <span class="days" style="color:greenyellow">Sat</span><br>
                <span class="time" style="color:greenyellow">9:00AM - 6:00PM</span>
            <?php } else { ?>
                <span class="days">Sat</span><br>
                <span class="time">9:00AM - 6:00PM</span>
            <?php }
        ?>

        </div>
        <div class="var">
            <span class="days" style="color:red">Sun</span><br>
            <span class="time" style="color:red">Closed</span>
        </div>
    </div>
    <?php

}
add_shortcode( 'dynamic-timezone-data-footer', 'wpdev_dynamic_timezone_data_change_for_footer' );
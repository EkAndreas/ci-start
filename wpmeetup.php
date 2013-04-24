<?php
/*
Plugin Name: wpmeetup
Description: Calc example to WP Meetup Demo
Author: EkAndreas
Version: 1.0
Author URI: http://www.flowcom.se/
*/


class WPMeetUp_Calc{

	function __construct() {

		add_action( 'wp_enqueue_scripts', array( &$this, 'scripts') );

		add_shortcode( 'calc', array( &$this, 'calc') );

	}

	function calc(){

		?>
		<div id="calculator">
			<form action="#" method="post" id="test">
				<p><strong>Please insert decimals using the dot notation, e.g. <code>5.9</code></strong></p>
				<div>
					<label for="balance">Loan balance (&euro;)</label>
					<input name="balance" id="balance" type="text" />
				</div>
				<div>
					<label for="rate">Interest rate (%)</label>
					<input name="rate" id="rate" type="text" />
				</div>
				<div>
					<label for="term">Loan term (years)</label>
					<input name="term" id="term" type="text" />
				</div>
				<div>
					<label for="period">Period</label>
					<select name="period" id="period">
						<option>Select</option>
						<option value="12">Monthly</option>
						<option value="6">Bimonthly</option>
					</select>
				</div>
				<br/>
				<p><input type="submit" id="submit" name="submit" value="Calculate" /></p>

			</form>
		</div>
		<?php

	}

	function scripts(){

		wp_enqueue_style( 'calc-css', WP_PLUGIN_URL . '/wpmeetup/css/calc.css' );
		wp_enqueue_script( 'calc-js', WP_PLUGIN_URL . '/wpmeetup/js/calc.js', array( 'jquery' ) );

	}

}

// instance this class to an object
new WPMeetUp_Calc();


?>
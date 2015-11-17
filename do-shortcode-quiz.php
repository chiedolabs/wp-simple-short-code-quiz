<?php
/*
Plugin Name: DO Shortcode quiz
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'wp_enqueue_scripts', 'do_shortcode_quiz_scripts' );
function do_shortcode_quiz_scripts() {
  wp_enqueue_script('do-shortcode-quiz', plugin_dir_url( __FILE__ ).'do-shortcode-quiz.js', array("jquery"), "0.1", true);
}

add_shortcode( 'do-shortcode-quiz', 'do_shortcode_quiz' );
function do_shortcode_quiz( $atts , $content = null ) {
  $atts = shortcode_atts( array(
    'title' => '',
  ), $atts, 'do-shortcode-quiz' );
?>
  <style>
    .do-shortcode-question { display: none; }
    .do-shortcode-current-question { display: block; }
    
    .do-shortcode-prev, .do-shortcode-next { display: none }
  </style>
  <div class="do-shortcode-quiz">
    <div class="do-shortcode-title"><?php echo $atts['title'] ?></div>
    <div class="do-shortcode-questions">
      <?php echo do_shortcode($content) ?>
    </div>
    <div class="do-shortcode-prev do-shortcode-btn">Previous</div>
    <div class="do-shortcode-next do-shortcode-btn">Next</div>
  </div>
<?php
}

add_shortcode( 'do-shortcode-question', 'do_shortcode_question' );
function do_shortcode_question( $atts , $content = null ) {
  $atts = shortcode_atts( array(
    'title' => '',
  ), $atts, 'do-shortcode-question' );
?>
  <div class="do-shortcode-question">
    <div class="do-shortcode-title"><?php echo $atts['title'] ?></div>
    <div class="do-shortcode-choices">
      <?php echo do_shortcode($content) ?>
    </div>
  </div>
<?php
}

add_shortcode( 'do-shortcode-choice', 'do_shortcode_choice' );
function do_shortcode_choice( $atts , $content = null ) {
  $atts = shortcode_atts( array(
    'message' => '',
    'correct' => false,
  ), $atts, 'do-shortcode-choice' );
?>
  <div class="do-shortcode-choice">
    <div class="do-stortcode-message"><?php echo $atts['message'] ?></div>
    <?php echo $content ?>
  </div>
<?php
}
?>

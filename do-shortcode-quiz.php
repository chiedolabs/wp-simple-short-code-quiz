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
    .do-shortcode-questions > br, .do-shortcode-questions > p,
    .do-shortcode-question > br, .do-shortcode-question > p { display: none; }
    .do-shortcode-question { display: none; }
    .do-shortcode-current-question { display: block; }

    .do-shortcode-choices > br, .do-shortcode-choices > p,
    .do-shortcode-choice > br, .do-shortcode-choice > p { display: none; }
    .do-shortcode-choice { cursor: pointer; }
    
    .do-shortcode-message { display: none; }
    .do-shortcode-correct { color: green; font-size: 12px; }
    .do-shortcode-incorrect { color: red; font-size: 12px; }

    .do-shortcode-nav { margin-top: 10px; }
    .do-shortcode-btn { background: #000000; color: #ffffff; padding:10px; cursor: pointer; }
    .do-shortcode-prev, .do-shortcode-next { display: none }
  </style>
  <div class="do-shortcode-quiz">
    <h2 class="do-shortcode-title"><?php echo $atts['title'] ?></h2>
    <div class="do-shortcode-questions">
      <?php echo do_shortcode($content) ?>
    </div>
    <div class="do-shortcode-nav">
      <span class="do-shortcode-prev do-shortcode-btn">Previous<span class="do-shortcode-nav-sep">&nbsp;&nbsp;</span></span>
      <span class="do-shortcode-next do-shortcode-btn">Next</span>
    </div>
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
    <h3 class="do-shortcode-title"><?php echo $atts['title'] ?></h3>
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

  if($atts['correct']) {
    $message = "<span class='do-shortcode-correct'><strong>Correct:</strong> " . $atts['message']. '</span>';
  } else {
    $message = "<span class='do-shortcode-incorrect'><strong>Incorrect:</strong> " . $atts['message']. '</span>';
  }
?>
  <div class="do-shortcode-choice">
    <?php echo $content ?>
    <div class="do-shortcode-message"><?php echo $message; ?></div>
  </div>
<?php
}
?>

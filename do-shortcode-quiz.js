jQuery(document).ready(function() {
  // Scripts. Encapsulated in an anonymous function to avoid conflicts.
  (function($) {
    var updateView = function() {
      var numQuestions = $('.do-shortcode-question').length;
      var currentQuestionNum = null;
      var count = 1;

      // We need to get the number of the current question
      $('.do-shortcode-question').each(function(){
        if($(this).hasClass('do-shortcode-current-question')) {
          currentQuestionNum = count;
        } else {
          count++;
        }
      });
      
      // Update the next and previous buttons' visibility
      if(currentQuestionNum === 1 || currentQuestionNum === null) {
        $('.do-shortcode-prev').css('display', 'none');
      } else {
        $('.do-shortcode-prev').css('display', 'inline-block');
      }

      if(currentQuestionNum === numQuestions) {
        $('.do-shortcode-next').css('display', 'none');
      } else {
        $('.do-shortcode-next').css('display', 'inline-block');
      }
    }
    
    var previousQuestion = function(){
      var currentQuestion = $('.do-shortcode-question.do-shortcode-current-question');
      currentQuestion.removeClass('do-shortcode-current-question');
      currentQuestion.prev().addClass('do-shortcode-current-question');
      updateView();
    }

    var nextQuestion = function(){
      var currentQuestion = $('.do-shortcode-question.do-shortcode-current-question');
      currentQuestion.removeClass('do-shortcode-current-question');
      currentQuestion.next().addClass('do-shortcode-current-question');
      updateView();
    }

    var choiceSelected = function(){
      // First hide all of the other choice messages
      $(this).siblings().find('.do-shortcode-message').css('display','none');

      // Show the message for the choice we just clicked on
      $(this).find('.do-shortcode-message').css('display','block');
      
      // Make sure the radio button is updated
      $(this).find('input').attr('checked', true);
    }

    
    // Bind functions to events
    $('.do-shortcode-next').click(nextQuestion);
    $('.do-shortcode-prev').click(previousQuestion);
    $('.do-shortcode-choice').click(choiceSelected);

    // Run the first call of updating the view and set the first question as the first current question
    $('.do-shortcode-question').first().addClass('do-shortcode-current-question');
    updateView();
  })( jQuery ); // End scripts
});

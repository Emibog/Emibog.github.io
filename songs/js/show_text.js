$text = $('p').hide();

function show_text($text) {
  $text.toggle();
  if ($('button').text() == 'Показать текст песни') {
    $('button').text('Скрыть текст песни');
  } else {
    $('button').text('Показать текст песни');
  }
}

$('button').on('click', function() {
  show_text($text);
});

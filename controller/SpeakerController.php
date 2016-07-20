<?php header("Content-Type: text/html; charset=utf-8"); ?>
<?php if(isset($_GET['text'])): ?>
  <audio autoplay="autoplay" src="<?= 'https://tts.voicetech.yandex.net/generate?text='.$_GET['text'].'&format=mp3&lang=ru-RU&speaker=ermil&emotion=good&speed=1&key=3414c5a5-84eb-499d-9e28-560452de7237' ?>"></audio>
<?php endif ?>
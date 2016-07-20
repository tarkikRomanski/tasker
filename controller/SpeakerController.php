<?php
header("Content-Type: text/html; charset=utf-8");
define('LG', 'ru-RU');
define('KEY', '3414c5a5-84eb-499d-9e28-560452de7237');
define('SPEED', '0.8');
define('SPEAKER', 'ermil');
define('EMOTION', 'good');
?>


<?php if(isset($_GET['text'])): ?>
  <audio id="speaker" autoplay="autoplay" src="<?= 'https://tts.voicetech.yandex.net/generate?text='.$_GET['text'].'&format=mp3&lang='.LG.'&speaker='.SPEAKER.'&emotion='.EMOTION.'&speed='.SPEED.'&key='.KEY ?>"></audio>
<?php endif ?>
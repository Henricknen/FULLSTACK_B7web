<?php $render('header'); ?>      <!-- '$render' puxa um arquivo parçial -->

Me chamo : <?php echo $nome; ?><br>
tenho : <?php echo $idade; ?> anos

<hr>

<?php foreach($posts as $post); ?>
<h3><?php echo $post['titulo']; ?></h3>
<p><?php echo $post['corpo']; ?></p>
<?php endforeach; ?>
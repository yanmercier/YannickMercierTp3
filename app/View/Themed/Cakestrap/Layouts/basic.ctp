<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sample App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
      echo $this->Html->css('https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
    ?>
  </head>

  <body>
  </br>
  <?php echo $content_for_layout; ?>

  <!-- our scripts will be here -->
  <?php echo $scripts_for_layout; ?>
  </body>
</html>
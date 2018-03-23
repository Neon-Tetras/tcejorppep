<html>
<head>
        <title><?php echo $title; ?></title>
</head>
<body>
        <h1><?php echo $heading; ?></h1>
        
        <p><?php echo $message; ?></p>
        
        <?php foreach ($todo_list as $list):?>
            
        <p><?php echo $list; ?></p>
        <?php endforeach; ?>
</body>
</html>
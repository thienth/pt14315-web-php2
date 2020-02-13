<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h2{
            color: green;
        }
        p{
            max-width: 400px;
        }
    </style>
</head>
<body>
    
    <ul>
        <?php foreach($users as $user): ?>
            <li><?php echo $user->name; ?></li>
        <?php endforeach;?>
    </ul>
</body>
</html>
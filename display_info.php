<?php
    //get firstname, lastname, and age
    $first_name = filter_input(INPUT_GET, 'first_name');
    $last_name = filter_input(INPUT_GET, 'last_name');
    $age = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT);

    //set current date for display
    $date = date('m/d/Y');

    //generate error message for name variables
    if($first_name == NULL || $last_name == NULL || $first_name == '' || $last_name == ''){
        $error_message = 'You did not submit firstname and lastname parameters.';
    }else{
        $error_message = '';
    }
    
    //generate error message for age variable
    if($age === FALSE || $age == NULL){
        $error_message .= ' You did not submit a numeric age parameter.';
    }else if($age < 0){
        $error_message .= ' Age must be greater than 0.';
    }
    else{
        //do nothing
    }
    
    //calculate age in days
    $days = $age * 365;
    
    //calculate if voting age
    if($age < 18){
        $voting_age = "I am not old enough to vote in the United States";
    }
    else{
        $voting_age = "I am old enough to vote in the United States";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>GET practice</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <main>
        <?php if (!empty($error_message)) { ?>
            <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
        <?php } else { ?>
            <h3 class='date'>Today is <?php echo $date?></h3>
            <h1 class='name'>Hello, my name is <?php echo htmlspecialchars($first_name)?> <?php echo htmlspecialchars($last_name)?></h1>
            <p class='age'>I am <?php echo htmlspecialchars($age)?> years old, and <?php echo $voting_age?></p>
            <p class='age'>That means I'm at least <?php echo $days?> days old.</p>
        <?php } ?>
    </main>
</body>
</html>
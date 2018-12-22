<?php 
$title = 'User'; 
?>

<?php 
ob_start(); 
?>

<h1>User</h1>

<div>
    id : <?php echo $user->id; ?>
</div>
<div>
    firstname : <?php echo $user->firstname; ?>
</div>
<div>
    lastname : <?php echo $user->lastname; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
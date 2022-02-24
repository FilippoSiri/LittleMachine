<li class="nav-item <?php echo isset($update) ? 'active' : '' ?>">
    <a href="<?php echo $root ?>/pages/modificaUtente.php" class="nav-link"><?php echo $_SESSION['nome'].' '.$_SESSION['cognome'];?></a>
</li>
<li class="nav-item">
    <a href="<?php echo $root ?>/api/logout.php" class="nav-link">Logout</a>
</li>


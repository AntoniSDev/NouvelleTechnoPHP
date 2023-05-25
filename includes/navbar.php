<nav>
    <h1>Title</h1>
    <ul>
        <li>Main</li>
        <li>Services</li>
        <li>Contact</li>
        <?php if(!isset($_SESSION["user"])): ?>
        <li><a href="../NouvelleTechnoPHP/connexion.php">connexion</a></li>     
        <li><a href="../NouvelleTechnoPHP/register.php">register</a></li>  
        <?php else: ?>
            <li>Bonjour <?= $_SESSION["user"]["nick"]?></li>
        <li><a href="../NouvelleTechnoPHP/disconnect.php">disconnect</a></li>  
        <?php endif; ?>
    </ul>
</nav>
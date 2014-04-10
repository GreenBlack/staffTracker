    <!DOCTYPE html>

<?php
    
    include( "loader.php" );
    loadPlayerInfo();
    $playerInfo = getPlayerInfo();
    echo ( $playerInfo['responce']['players']['personaname'] );

?>
        
    </body>
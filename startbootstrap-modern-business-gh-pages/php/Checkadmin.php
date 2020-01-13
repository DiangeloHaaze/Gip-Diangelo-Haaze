
<?php
if(isset($_SESSION["gebruikernaam"])){
    $gebruikersnaam = $_SESSION["gebruikernaam"];
        switch($gebruikersnaam){
            case 'BaXtabR':
                $_SESSION["adminkey"] = true;
                break;
            case 'VDBJordy':
                $_SESSION["adminkey"] = true;
                break;
            case 'MvrVanDamme':
                $_SESSION["adminkey"] = true;
                break;
            default:
                $_SESSION["adminkey"] = false;
                break;
        }
}
?>
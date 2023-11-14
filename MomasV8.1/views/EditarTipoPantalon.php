<?php 
require_once '../model/TipoPantalon.php';
extract($_REQUEST);
$Conexion = new Conexion();
$objPantalon = new  TipoPantalon($idPantalon,null);
$pantalon = $objPantalon->consultarTipoPantalonPorId($idPantalon);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar pantalon</title>
    <link rel="icon" href="/vista/imagenes/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="css/RegistrarPantalon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="pantalon">
    <header>
        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user" id="login-open-pantalon"></a>
        </div>
    </header>
    
           

     <div class="wrapper">
        <span class="icon-close">
           <ion-icon name="close-outline"></ion-icon>
        </span>
       <div class="form-box login">
        <h2>tipo Pantalon</h2>
        <form action="../controller/ValidarEditarTipoPantalon.php"method="post">
            <div class="input-box">
                <span class="icon">
                    <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M12 19H16.4363C16.7532 19 17.0154 18.7536 17.0352 18.4374L17.9602 3.63743C17.9817 3.29201 17.7074 3 17.3613 3H6.63426C6.28981 3 6.01608 3.28936 6.03518 3.63328L6.96852 20.4333C6.98618 20.7512 7.24915 21 7.56759 21H11.4C11.7314 21 12 20.7314 12 20.4V8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> </svg>                </span>
                <input type="text" name ="tipoPantalon" value="<?php echo $pantalon['tipoPantalon']; ?> " required>
                <input type="hidden" name="idPantalon" value="<?php echo $idPantalon; ?>">
                <label>Pantalon</label>
            </div>       
                          
            <div class="remember-forgot">              
               <div class="login-register">
                    <button type="submit" id="btn" class="register-link">Registrar</a></p>
               </div>
           </form>
       </div>
       <div class="form-box register">           
           <form action="#">          
               <div class="login-register">
                    <a href="#" class="login-link"></a>
               </div>
           </form>
       </div>
   </div>
    <!-- <link rel="stylesheet" href="./vista/scripts/login.js"> -->
    <script src="js/RegistrarPantalon.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
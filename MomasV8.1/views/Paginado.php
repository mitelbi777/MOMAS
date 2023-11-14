<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pajinado</title>
    <link rel="stylesheet" href="./css/Pajinado.css">
</head>
<body>
    <div class="body">
        <div class="container-pagination">
            <ul class="pagination">
                <li><a href="#" class="prev">< Prev</a></li>
                <li class="pageNumber active"><a href="#">1</a></li>
                <li class="pageNumber"><a href="#">2</a></li>
                <li class="pageNumber"><a href="#">3</a></li>
                <li class="pageNumber"><a href="#">4</a></li>
                <li class="pageNumber"><a href="#">5</a></li>
                <li class="pageNumber"><a href="#">6</a></li>
                <li><a href="#" class="next">Next ></a></li>
            </ul>
        </div>

    </div>

    <script src="./js/pajinado.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Función para manejar los números de página
            $('.pageNumber').click(function(){
                // Eliminar la clase 'active' de todos los números de página
                $('.pagination .pageNumber').removeClass('active');
                // Agregar la clase 'active' al número de página que se hizo clic
                $(this).addClass('active');
            });
    
            // Función para manejar el botón "Next"
            $('.next').click(function(){
                var activePage = $('.pagination').find('.pageNumber.active');
                var nextPage = activePage.next('.pageNumber');
    
                if (nextPage.length) {
                    // Eliminar la clase 'active' de la página actual
                    activePage.removeClass('active');
                    // Agregar la clase 'active' a la siguiente página
                    nextPage.addClass('active');
                }
            });
    
            // Función para manejar el botón "Prev"
            $('.prev').click(function(){
                var activePage = $('.pagination').find('.pageNumber.active');
                var prevPage = activePage.prev('.pageNumber');
    
                if (prevPage.length) {
                    // Eliminar la clase 'active' de la página actual
                    activePage.removeClass('active');
                    // Agregar la clase 'active' a la página anterior
                    prevPage.addClass('active');
                }
            });
        });
    </script>
    
</body>
</html>
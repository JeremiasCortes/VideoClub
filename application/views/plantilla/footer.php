<!-- Footer -->
<footer class="bg-primary py-5 mt-3">
    <div class="container px-4 px-lg-5">
        <div class="large text-center text-muted">
            <p class="text-light">&copy; 2024 | Todos los derechos reservados | Ejercicio práctico</p>
        </div>
    </div>
</footer>
<!-- ------ Fin Footer ----- -->

<script>
$(document).ready(function() {
    // Función para ajustar la posición del footer
    function ajustarFooter() {
        // Altura del contenido
        var contenidoHeight = $('body').height();
        // Altura de la ventana del navegador
        var windowHeight = $(window).height();
        // Si la altura del contenido es menor que la altura de la ventana, ajusta el footer
        if (contenidoHeight < windowHeight) {
            $('footer').addClass('fixed-bottom');
        } else {
            $('footer').removeClass('fixed-bottom');
        }
    }
    // Llama a la función al cargar la página y al cambiar el tamaño de la ventana
    ajustarFooter();
    $(window).resize(ajustarFooter);
});
</script>

</body>

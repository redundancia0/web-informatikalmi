document.addEventListener('DOMContentLoaded', function() {
    var searchInputContainer = document.getElementById('searchInputContainer');
    var toggleSearch = document.getElementById('toggleSearch');

    // Oculta el campo de búsqueda al cargar la página
    searchInputContainer.style.display = 'none';

    // Agrega un evento de clic al enlace para mostrar/ocultar el campo de búsqueda
    toggleSearch.addEventListener('click', function() {
        if (searchInputContainer.style.display === 'none') {
            searchInputContainer.style.display = 'block';
        } else {
            searchInputContainer.style.display = 'none';
        }
    });
});

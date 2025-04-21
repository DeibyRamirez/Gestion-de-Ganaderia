 // Espera a que el documento esté completamente cargado
 document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-mensaje');
    const errorMessage = document.getElementById('error-mensaje');

    if (successMessage) {
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 5000); // 5000 milisegundos = 5 segundos
    }

    if (errorMessage) {
        setTimeout(() => {
            errorMessage.style.display = 'none';
        }, 5000);
    }
});
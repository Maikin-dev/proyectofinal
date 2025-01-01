document.getElementById("contactoForm").addEventListener("submit", function (event) {
    const nombre = document.getElementById("nombre").value.trim();
    const email = document.getElementById("email").value.trim();
    const asunto = document.getElementById("asunto").value.trim();
    const comentario = document.getElementById("comentario").value.trim();

    if (!nombre || !email || !asunto || !comentario) {
        event.preventDefault(); 
        alert("Por favor, complete todos los campos.");
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        event.preventDefault();
        alert("Por favor, ingrese un correo electrónico válido.");
        return;
    }

    alert("Formulario enviado correctamente.");
});

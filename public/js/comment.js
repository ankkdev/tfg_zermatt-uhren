/* 
1. Espera  aque la pagina se cargue
2. Seelcciona el formulario de comentarios y le añade un detector para el evento submit
3. Evita la recarga de la pagina y usa fetch para enviar el comentario al servidor
4. Procesa la respuesta JSON y si es correcto,crea y inserta dinamicamente un nuevo <div> con el comentario dentro
5. Reinicia el formulario

Lo hago con JSON para enviar de forma estructurada todos los datos desde el servidor al navegador sin que recargue la pagina.
*/
document.addEventListener('DOMContentLoaded', function () {
    const commentForm = document.querySelector('form[action="/zermatt-uhren/add-comment.php"]');
    if (commentForm) {
        commentForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(commentForm);
            try {
                const response = await fetch(commentForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }
                const data = await response.json();
                if (data.error) {
                    alert(data.error);
                    return;
                }

                const commentDiv = document.createElement('div');//crear el div del comentario con su comentario correspondiente
                commentDiv.className = 'p-4 mb-4 border rounded';
                commentDiv.innerHTML = `<p class="font-bold">${data.username} dice:</p>
                                        <p>${data.comment}</p>
                                        <small class="text-gray-500">${data.created_at}</small>`;

                const commentsContainer = document.getElementById('commentsContainer');//insertar el nuevo comentario al inicio de la lista

                if (commentsContainer) {
                    commentsContainer.insertBefore(commentDiv, commentsContainer.firstChild);
                }
                commentForm.reset();//reiniciar el formulario
            } catch (error) {
                console.error(error);
            }
        });
    }
});
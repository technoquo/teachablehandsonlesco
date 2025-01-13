window.preview_image = function(event, querySelector){

    //Recuperamos el input que desencadeno la acción
    let input = event.target;

    //Recuperamos la etiqueta img donde cargaremos la imagen
    let imgPreview = document.querySelector(querySelector);

    // Verificamos si existe una imagen seleccionada
    if (!input.files.length) return;

    //Recuperamos el archivo subido
    let file = input.files[0];

    //Creamos la url
    let objectURL = URL.createObjectURL(file);

    //Modificamos el atributo src de la etiqueta img
    imgPreview.src = objectURL;

}
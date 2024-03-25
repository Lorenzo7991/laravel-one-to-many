function previewImage(input) {
    let reader = new FileReader();

    reader.onload = function (event) {
        document.getElementById('thumb-preview').src = event.target.result;
        document.getElementById('thumb-preview').style.display = 'block';
    };

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}

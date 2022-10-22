const tombolCari = document.querySelector(".tombol-cari");
const keyword = document.querySelector(".keyword");
const tex = document.querySelector(".tex");

// hilangkan tombol cari
tombolCari.style.display = "none";

// event ketika menulis keyword pada pencarian
keyword.addEventListener("keyup", function() {
    // console.log("ok!");
    // ajax
    // xmlhttprequest
    // const xhr = new XMLHttpRequest();

    // xhr.onreadystatechange = function() {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         // console.log(xhr.responseText);
    //         tex.innerHTML = xhr.responseText;
    //     }
    // };

    // xhr.open("get", "ajax/ajax_cari.php?keyword=" + keyword.value);
    // xhr.send();

    // fetch()

    fetch("ajax/ajax_cari.php?keyword=" + keyword.value)
        .then((response) => response.text())
        .then((response) => (tex.innerHTML = response));
});

// lihat gambar untu tambah dan ubah
function previewImage() {
    const gambar = document.querySelector(".gambar");
    const imgPreview = document.querySelector(".img-preview");

    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}
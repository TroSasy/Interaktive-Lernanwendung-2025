document.addEventListener("DOMContentLoaded", () => {
    const haseImg = document.getElementById("hase-img");

    haseImg.addEventListener("mouseenter", () => {
        haseImg.src = "mascot_face_02.svg";
    });

    haseImg.addEventListener("mouseleave", () => {
        haseImg.src = "mascot_face_01.svg";
    });

    haseImg.addEventListener("click", () => {
        haseImg.src = "mascot_face_02.svg";
        setTimeout(() => {
            haseImg.src = "mascot_face_01.svg";
        }, 1000);
    });

    // ACHTUNG: Der Button ist in index.php, also außerhalb der geladenen hasen.html
    const abmeldenButton = document.getElementById("abmelden-btn");
    if (abmeldenButton) {
        abmeldenButton.addEventListener("click", () => {
            haseImg.src = "mascot_face_04.svg";
        });
    }
});

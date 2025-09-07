document.addEventListener("DOMContentLoaded", function () {
    console.log("Sistem Gudang siap digunakan!");
    highlightSidebar();
});

function highlightSidebar() {
    const links = document.querySelectorAll("aside.sidebar a");
    links.forEach(link => {
        link.addEventListener("mouseover", function () {
            this.classList.add("hovered");
        });
        link.addEventListener("mouseout", function () {
            this.classList.remove("hovered");
        });
    });
}

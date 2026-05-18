document.addEventListener("DOMContentLoaded", function(){

    const rows = document.querySelectorAll("table tr");

    rows.forEach((row, index) => {

        row.style.opacity = "0";

        setTimeout(() => {
            row.style.opacity = "1";
            row.style.transition = "1s";
        }, index * 100);

    });

});
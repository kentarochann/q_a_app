document.getElementById("display").style.display = "none";

const displayBtn = () => {
    const display = document.getElementById("display");

    if (display.style.display == "block") {
        display.style.display = "none";
    } else {
        display.style.display = "block";
    }
};

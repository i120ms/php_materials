let oddanoGlos = false;

function glosuj(imie, zdjecie) {

    if (oddanoGlos) {
        alert("Przykro nam, ale już oddano głos z tego komputera");
        return;
    }

    document.getElementById("glowneZdjecie").src = zdjecie;

    document.getElementById("wynik").innerHTML =
        "<h2>Dziękujemy za udział w głosowaniu.</h2>" +
        "<p>Zagłosowałaś/zagłosowałeś na kota o imieniu: <b>"
        + imie +
        "</b></p>";

    oddanoGlos = true;
}
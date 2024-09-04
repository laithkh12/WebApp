function enablelack() {
    document.getElementById("padicure").hidden = true;
    document.getElementById("manicure").hidden = true;
    document.getElementById("treatment").hidden = true;
    if (document.getElementById("openlackdiv").onmouseover) {
        document.getElementById("itemdiv").hidden = false;
        document.getElementById("lack").hidden = false;
    }

}

function disablelack() {
    document.getElementById("itemdiv").hidden = true;
}

function enablepad() {
    document.getElementById("lack").hidden = true;
    if (document.getElementById("openpaddiv").onmouseover) {
        document.getElementById("itemdiv").hidden = false;
        document.getElementById("padicure").hidden = false;
    }
}

function enableman() {
    document.getElementById("lack").hidden = true;
    document.getElementById("padicure").hidden = true;
    if (document.getElementById("openmandiv").onmouseover) {
        document.getElementById("itemdiv").hidden = false;
        document.getElementById("manicure").hidden = false;
    }
}

function enabletreat() {
    document.getElementById("lack").hidden = true;
    document.getElementById("padicure").hidden = true;
    document.getElementById("manicure").hidden = true;
    if (document.getElementById("opentrdiv").onmouseover) {
        document.getElementById("itemdiv").hidden = false;
        document.getElementById("treatment").hidden = false;
    }
}

function onlackdiv() {
    if (document.getElementById("itemdiv").onmouseover) {
        document.getElementById("itemdiv").hidden = false;
    }
}

function outlackdiv() {
    if (document.getElementById("itemdiv").onmouseout) {
        document.getElementById("itemdiv").hidden = true;
    }
}





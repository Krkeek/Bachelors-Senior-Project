//#region Sticker Tabs Settings
function openTab(evt, Name) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(Name).style.display = "block";
    evt.currentTarget.className += " active";
}

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("defaultOpen").click();
});
//#endregion

//#region Drag & Drop Settings
var p;

const fills = document.querySelectorAll(".fill");
const empties = document.querySelectorAll(".empty");
//Fill Listners
for (const fill of fills) {
    fill.addEventListener("dragstart", dragStart);
    fill.addEventListener("dragend", dragEnd);
}

//Loop Through Empties and call drag events
for (const empty of empties) {
    empty.addEventListener("dragover", dragOver);
    empty.addEventListener("dragenter", dragEnter);
    empty.addEventListener("dragleave", dragLeave);
    empty.addEventListener("drop", dragDrop);
}

//Drag Functions
function dragStart() {
    this.className += " hold";
}

function dragEnd() {
    this.className = "fill";
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
    this.className += " hovered";
}

function dragLeave() {
    this.className = "empty";
}

function dragDrop(ev) {
    ev.preventDefault();
    this.className = "empty";
    var i = p.querySelectorAll(".myImg");
    var dropBox = this.id;
    if (this.innerHTML === "") {
        var copyFill = p.cloneNode(true);
        this.appendChild(copyFill);
        refreshShirt();

        if (dropBox == "pocketSticker") {
            shirt.pocketSticker = i[0].id;
        }
        if (dropBox == "frontSticker") {
            shirt.frontSticker = i[0].id;
        }
        if (dropBox == "backSticker") {
            shirt.backSticker = i[0].id;
        }
    } else {
        this.innerHTML = "";

        var copyFill = p.cloneNode(true);
        this.appendChild(copyFill);
        refreshShirt();

        if (dropBox == "pocketSticker") {
            shirt.pocketSticker = "";
            shirt.pocketSticker = i[0].id;
        }
        if (dropBox == "frontSticker") {
            shirt.frontSticker = "";
            shirt.frontSticker = i[0].id;
        }
        if (dropBox == "backSticker") {
            shirt.backSticker = "";
            shirt.backSticker = i[0].id;
        }
    }
    refreshStickerPrice();
}

function photoDrag(photoDragged) {
    p = photoDragged;
}
//#endregion

//#region Show/Hide Guildlines of the Sticker Box
function guildLines() {
    if (document.getElementById("pocketSticker").style.border === "none") {
        document.getElementById("pocketSticker").style.border = "1px dotted gray";
        document.getElementById("topSticker").style.border = "1px dotted gray";
        document.getElementById("frontSticker").style.border = "1px dotted gray";
        document.getElementById("backSticker").style.border = "1px dotted gray";
    } else {
        document.getElementById("pocketSticker").style.border = "none";
        document.getElementById("topSticker").style.border = "none";
        document.getElementById("frontSticker").style.border = "none";
        document.getElementById("backSticker").style.border = "none";
    }
}
//#endregion

//#region create a shirt object
let shirt = {
    type: "Tshirt",
    color: "Black",
    size: "Xsmall",
    view: "Front",
    pocketSticker: "../../images/cssPhotos/empty.png",
    frontSticker: "../../images/cssPhotos/empty.png",
    backSticker: "../../images/cssPhotos/empty.png",
    price: "empty",
};
//#endregion

//#region Default Shirt Settings (onStartup)
var TshirtColors = document.getElementById("TshirtColors");
var HoodieColors = document.getElementById("HoodieColors");
var PulloverColors = document.getElementById("PulloverColors");
var shirtChosen = document.getElementById("shirtChosen");
shirt.price = 6;
shirtChosen.style.backgroundImage = "url('../../images/shirts/T-shirts/Black-Tshirt-Front.png')";
TshirtColors.style.display = "Block";
var price = document.getElementById("price");
var t = document.createTextNode("6$");
price.appendChild(t);
document.getElementById("pocketSticker").style.display = "inline-flex";
document.getElementById("topSticker").style.display = "none";
document.getElementById("frontSticker").style.display = "inline-flex";
document.getElementById("backSticker").style.display = "none";
//#endregion

//#region Shirt refresh(after modifying shirt object,shirt should be refreshed)
function refreshShirt() {
    //#region if the shirt is 'Tshirt'
    if (shirt.type == "Tshirt") {
        PulloverColors.style.display = "none";
        HoodieColors.style.display = "none";
        TshirtColors.style.display = "block";

        if (shirt.color == "Black") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Black-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Black-Tshirt-Back.png')";
            }
        }

        if (shirt.color == "red") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Red-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Red-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Asphalt-gray") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Asphalt-gray-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Asphalt-gray-Tshirt-Back.png')";
            }
        }

        if (shirt.color == "Deep-navy") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Deep-navy-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Deep-navy-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Heather-blue") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Blue-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Blue-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Heather-burgundy") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Burgundy-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Burgundy-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Heather-gray") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Gray-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Gray-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Heather-iceblue") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Ice-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Ice-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Heather-oatmeal") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Oatmeal-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Oatmeal-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Kelly-green") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Kelly-green-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Kelly-green-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Olive-green") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Olive-green-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Olive-green-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Pink") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Pink-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Pink-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Purple") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Purple-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Purple-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Royal-blue") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Royal-blue-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Royal-blue-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Steel-blue") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Steel-blue-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Steel-blue-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Steel-green") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Steel-green-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Steel-green-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Teal") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Teal-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Teal-Tshirt-Back.png')";
            }
        }

        if (shirt.color == "White") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/White-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/White-Tshirt-Back.png')";
            }
        }
        if (shirt.color == "Yellow") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Yellow-Tshirt-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/T-shirts/Yellow-Tshirt-Back.png')";
            }
        }
    }
    //#endregion

    //#region  if the shirt is 'Pullover'
    if (shirt.type == "Pullover") {
        HoodieColors.style.display = "none";
        TshirtColors.style.display = "none";
        PulloverColors.style.display = "Block";

        if (shirt.color == "Black") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Black-Pullover-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Black-Pullover-Back.png')";
            }
        }
        if (shirt.color == "Burgundy") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Burgundy-Pullover-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Burgundy-Pullover-Back.png')";
            }
        }
        if (shirt.color == "White") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/White-Pullover-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/White-Pullover-Back.png')";
            }
        }
        if (shirt.color == "navy") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Navy-Pullover-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Navy-Pullover-Back.png')";
            }
        }
        if (shirt.color == "Gray") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Gray-Pullover-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Gray-Pullover-Back.png')";
            }
        }
        if (shirt.color == "Red") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "inline-flex";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Red-Pullover-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Pullovers/Red-Pullover-Back.png')";
            }
        }
    }
    //#endregion

    //#region if the shirt is 'Hoodie'
    if (shirt.type == "Hoodie") {
        shirt.frontSticker = "../../images/cssPhotos/none.png";
        PulloverColors.style.display = "none";
        TshirtColors.style.display = "none";
        HoodieColors.style.display = "block";

        if (shirt.color == "Demin") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Denim-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Denim-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Charcoal-gray") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Charcoal-gray-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Charcoal-gray-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Olive-green") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Olive-green-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Olive-green-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Gray") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Gray-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Gray-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Royal-blue") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Royal-blue-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Royal-blue-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "White") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/White-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/White-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Burgundy") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Burgundy-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Burgundy-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Black") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Black-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Black-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Navy") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Navy-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Navy-Hoodie-Back.png')";
            }
        }
        if (shirt.color == "Red") {
            if (shirt.view == "Front") {
                document.getElementById("pocketSticker").style.display = "inline-flex";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "none";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Red-Hoodie-Front.png')";
            }
            if (shirt.view == "Back") {
                document.getElementById("pocketSticker").style.display = "none";
                document.getElementById("topSticker").style.display = "none";
                document.getElementById("frontSticker").style.display = "none";
                document.getElementById("backSticker").style.display = "inline-flex";
                shirtChosen.style.backgroundImage =
                    "url('../../images/shirts/Hoodies/Red-Hoodie-Back.png')";
            }
        }
    }
    //#endregion

    console.log(shirt);
}
//#endregion

//#region when Type is selected (Type Spinner)
function selectType() {
    shirt.color = "Black";
    var shirtType = document.getElementById("shirtType");
    var selectedValue = shirtType.options[shirtType.selectedIndex].value;
    shirt.type = selectedValue;
    refreshStickerPrice();
    refreshShirt();
}
//#endregion

//#region when View is selected (View Spinner)
function selectView() {
    var shirtView = document.getElementById("shirtView");
    var selectedView = shirtView.options[shirtView.selectedIndex].value;
    shirt.view = selectedView;
    refreshShirt();
}
//#endregion

//#region when Color is selected
function colorChoose(color) {
    shirt.color = color.alt;
    refreshShirt();
}
//#endregion

//#region when size is selected
function sizeChoose(size) {
    shirt.size = size.id;
}
//#endregion

//#region Refresh the price after any change
function refreshStickerPrice() {
    var shirtCost = 0;
    var x = 0;
    var y = 0;
    var z = 0;
    if (shirt.type == "Tshirt") {
        shirtCost = 6;
        if (shirt.pocketSticker == "../../images/cssPhotos/empty.png") {} else {
            x = 1;
        }
        if (shirt.backSticker == "../../images/cssPhotos/empty.png") {} else {
            z = 3;
        }
        if (shirt.frontSticker == "../../images/cssPhotos/empty.png") {} else {
            y = 2;
        }
    }
    if (shirt.type == "Pullover") {
        shirtCost = 8;
        if (shirt.pocketSticker == "../../images/cssPhotos/empty.png") {} else {
            x = 1;
        }
        if (shirt.backSticker == "../../images/cssPhotos/empty.png") {} else {
            z = 3;
        }
        if (shirt.frontSticker == "../../images/cssPhotos/empty.png") {} else {
            y = 2;
        }
    }

    if (shirt.type == "Hoodie") {
        shirtCost = 12;
        if (shirt.pocketSticker == "../../images/cssPhotos/empty.png") {} else {
            x = 1;
        }
        if (shirt.backSticker == "../../images/cssPhotos/empty.png") {} else {
            z = 3;
        }

        y = 0;
    }

    //#region Add the new price to the html page
    price.innerHTML = "";
    shirt.price = shirtCost + x + y + z;
    t = document.createTextNode(shirt.price + "$");
    price.appendChild(t);
}
//#endregion

//#endregion

//#region OnClick -Clear Sticker Button
function clearStickers() {
    document.getElementById("pocketSticker").innerHTML = "";
    document.getElementById("topSticker").innerHTML = "";
    document.getElementById("frontSticker").innerHTML = "";
    document.getElementById("backSticker").innerHTML = "";
    shirt.pocketSticker = "../../images/cssPhotos/empty.png";
    shirt.backSticker = "../../images/cssPhotos/empty.png";
    shirt.frontSticker = "../../images/cssPhotos/empty.png";
    refreshStickerPrice();
    console.log(shirt);
}
//#endregion

//#region OnClick -Add to Cart Button
function objectToJson() {
    var shirtArray = [];
    shirtArray.push(shirt);

    $.ajax({
        url: "../../dataManagment/server.php",
        method: "POST",
        data: { Shirt: JSON.stringify(shirtArray), cartItemInsertion: 'cartItemInsertion' },
        success: function(res) {
            console.log(res);
        },
    });
    toDedault();
}
//#endregion

//#region Return the shirt to the default condition
function toDedault() {
    clearStickers();
    shirt.type = "Tshirt";
    shirt.color = "Black";
    shirt.size = "Xsmall";
    shirt.view = "Front";
    document.getElementById("pocketSticker").style.display = "inline-flex";
    document.getElementById("topSticker").style.display = "none";
    document.getElementById("frontSticker").style.display = "inline-flex";
    document.getElementById("backSticker").style.display = "none";
    shirtChosen.style.backgroundImage =
        "url('../../images/shirts/T-shirts/Black-Tshirt-Front.png')";
    document.getElementById("shirtView").selectedIndex = 0;
    document.getElementById("shirtType").selectedIndex = 0;
    document.getElementById("X-Small").checked = "checked";
    console.log(shirt);
}
//#endregion

//#region Delete any item from cart
function deleteFromCart(a) {
    var id = a;

    $.ajax({
        url: "../../dataManagment/server.php",
        method: "POST",
        data: { id: id, deletedProduct: 'deletedProduct' },
        success: function(res) {
            cart();
        },
    });
}
//#endregion

//#region Add the Stickers
var ajax = new XMLHttpRequest();
var method = "GET";

var url = "../../dataManagment/server.php?dataRetrieve=dataRetrieve";
var asynchronous = true;
ajax.open(method, url, asynchronous);
ajax.send();
ajax.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        var data = JSON.parse(this.responseText);

        var Logos = data.Logos;
        var Sports = data.Sports;
        var Symbols = data.Symbols;
        var Birthdays = data.Birthdays;
        var Qoutes = data.Qoutes;
        var Lebanese = data.Lebanese;
        var Graduation = data.Graduation;
        var Emojis = data.Emojis;
        var Corona = data.Corona;
        var Food = data.Food;

        var html1 = "";
        var html2 = "";
        var html4 = "";
        var html3 = "";
        var html5 = "";
        var html6 = "";
        var html7 = "";
        var html8 = "";
        var html9 = "";
        var html10 = "";
        for (var a = 0; a < Logos.length; a++) {
            var img = Logos[a].img_path;

            html1 += '<div class="fillIntable">';
            html1 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html1 += "<img class='myImg' id='" + img + "' src='" + img + "' >";
            html1 += "</div>";
            html1 += "</div>";
        }
        for (var a = 0; a < Sports.length; a++) {
            var img = Sports[a].img_path;

            html2 += '<div class="fillIntable">';
            html2 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html2 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html2 += "</div>";
            html2 += "</div>";
        }
        for (var a = 0; a < Symbols.length; a++) {
            var img = Symbols[a].img_path;

            html3 += '<div class="fillIntable">';
            html3 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html3 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html3 += "</div>";
            html3 += "</div>";
        }
        for (var a = 0; a < Birthdays.length; a++) {
            var img = Birthdays[a].img_path;

            html4 += '<div class="fillIntable">';
            html4 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html4 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html4 += "</div>";
            html4 += "</div>";
        }
        for (var a = 0; a < Qoutes.length; a++) {
            var img = Qoutes[a].img_path;

            html5 += '<div class="fillIntable">';
            html5 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html5 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html5 += "</div>";
            html5 += "</div>";
        }
        for (var a = 0; a < Emojis.length; a++) {
            var img = Emojis[a].img_path;

            html6 += '<div class="fillIntable">';
            html6 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html6 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html6 += "</div>";
            html6 += "</div>";
        }
        for (var a = 0; a < Lebanese.length; a++) {
            var img = Lebanese[a].img_path;

            html7 += '<div class="fillIntable">';
            html7 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html7 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html7 += "</div>";
            html7 += "</div>";
        }
        for (var a = 0; a < Graduation.length; a++) {
            var img = Graduation[a].img_path;

            html8 += '<div class="fillIntable">';
            html8 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html8 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html8 += "</div>";
            html8 += "</div>";
        }
        for (var a = 0; a < Corona.length; a++) {
            var img = Corona[a].img_path;

            html9 += '<div class="fillIntable">';
            html9 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html9 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html9 += "</div>";
            html9 += "</div>";
        }
        for (var a = 0; a < Food.length; a++) {
            var img = Food[a].img_path;

            html10 += '<div class="fillIntable">';
            html10 +=
                '<div class="fill" draggable="true" ondragstart="photoDrag(this)">';
            html10 +=
                "<img class='myImg' id='" + img + "' src='" + img + "' width='70px;'>";
            html10 += "</div>";
            html10 += "</div>";
        }
        document.getElementById("Logos").innerHTML = html1;
        document.getElementById("Sports").innerHTML = html2;
        document.getElementById("Symbols").innerHTML = html3;
        document.getElementById("Birthdays").innerHTML = html4;
        document.getElementById("Qoutes").innerHTML = html5;
        document.getElementById("Emojis").innerHTML = html6;
        document.getElementById("Lebanese").innerHTML = html7;
        document.getElementById("Graduation").innerHTML = html8;
        document.getElementById("Corona").innerHTML = html9;
        document.getElementById("Food").innerHTML = html10;
    }
};
//#endregion

//#region Fill the cart
cart();
var priceX = 0;

function cart() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?cartRetrieve=cartRetrieve";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var cartOrders = JSON.parse(this.responseText);
            var cartOrder = cartOrders.cartOrder;
            var html1 = "";
            var Tprice = 0;

            if (cartOrder.length == 0) {
                document.getElementById("noorderdivbutton").style.display = "block";
                document.getElementById("orderdivbutton").style.display = "none";
                document.getElementById("totalPrice").style.display = "none";
            } else {
                document.getElementById("noorderdivbutton").style.display = "none";
                document.getElementById("orderdivbutton").style.display = "block";
                document.getElementById("totalPrice").style.display = "block";
            }
            for (var a = 0; a < cartOrder.length; a++) {
                var product_id = cartOrder[a].product_id;
                var type = cartOrder[a].type;
                var size = cartOrder[a].size;
                var color = cartOrder[a].color;
                var price = cartOrder[a].price;
                var pocketSticker = cartOrder[a].pocket_sticker;
                var frontSticker = cartOrder[a].front_sticker;
                var backSticker = cartOrder[a].back_sticker;
                var url = identifyShirt(type, color);
                Tprice = Tprice + parseInt(price);
                html1 +=
                    "<div class='container orderContainer'><div class='row'><div class='col-3 orderItem'><img src='" +
                    url +
                    "' width='90px'>";
                html1 +=
                    " </div><div class='col-5 orderItem'><div class='container'><div class='row'><div class='col'><div class='row'></div><div class='row'><p class='cartText'>POCKET</p></div>";
                html1 +=
                    " <div class='row'><img src='" +
                    pocketSticker +
                    "' alt='Empty'  width='30px'></div></div>";
                html1 +=
                    " <div class='col'><div class='row'><p class='cartText'>FRONT</p></div><div class='row'><img src='" +
                    frontSticker +
                    "' alt='Empty'  width='30px'></div>";
                html1 +=
                    " </div><div class='col'><div class='row'><p class='cartText'>BACK</p></div><div class='row'><img src='" +
                    backSticker +
                    "' alt='Empty'  width='30px'>";
                html1 +=
                    " </div></div></div></div></div><div class='col-3 orderText'><h4 id='cartProductHeader'>" +
                    type +
                    "</h4><p><span style='font-weight:bold;'>Size: </span>" +
                    size +
                    "<br /><span style='font-weight:bold;'>Price: </span>" +
                    price +
                    "$</p></div><div id='trashCol' class='col-1 orderItem'>";
                html1 +=
                    " <svg onclick='deleteFromCart(this.id)' id='" +
                    product_id +
                    "' class='trash' xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>";
                html1 +=
                    " <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'></path> </svg>";
                html1 += " </div></div></div>";
                html1 += "<br/>";
            }
            priceX = Tprice;
            document.getElementById("Tprice").innerHTML = Tprice;
            document.getElementById("cartDrop").innerHTML = html1;
        }
    };
}
//#endregion

//#region OnClick - Order Item Button (Order all Items in the Cart)
function orderTheProducts() {
    $.ajax({
        url: "../../dataManagment/server.php?orderTheProducts=orderTheProducts",
        method: "POST",
        data: { price: priceX, orderTheProducts: 'orderTheProducts' },
        success: function() {
            cart();
            orders();
        },
    });
}
//#endregion

//#region Show all Orders of the customer in the Order Tab
orders();

function orders() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?orderRetrieve=orderRetrieve";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var Orders = JSON.parse(this.responseText);
            var Order = Orders.Order;
            var html1 = "";
            if (Order.length == 0) {
                document.getElementById("noorderExcited").style.display = "inline-flex";
                document.getElementById("orderExcited").style.display = "none";
            } else {
                for (var a = 0; a < Order.length; a++) {
                    var dateofOrder = Order[a].date_of_order;
                    var totalCost = Order[a].total_cost;
                    var deliveryStatus = Order[a].delivery_status;
                    var manufacture = Order[a].manufacture_status;
                    var orderId = Order[a].order_id;

                    html1 += "<div class='row row-md'>";
                    html1 += " <div class='col orderInfo'>" + dateofOrder + "</div>";
                    html1 += " <div class='col orderInfo'>" + totalCost + "</div>";
                    html1 += " <div class='col orderInfo'>" + manufacture + "</div>";
                    html1 += " <div class='col orderInfo'>" + deliveryStatus + "</div>";
                    html1 +=
                        " <div class='col orderInfo'><a style='font-size:15px !important' id='" + orderId + "' data-toggle='modal' data-target='#showMyOrder' onClick='showOrderedItems(event)'  type='button' class='btn btn-primary custom-btn blueB'>Show</a></div></div>";
                }
                document.getElementById("orderInfoR").innerHTML = html1;
                document.getElementById("noorderExcited").style.display = "none";
                document.getElementById("orderExcited").style.display = "block";
            }
        }
    };
}
//#endregion

//#region Link jQuery because I used Ajax to transmit Data from JS to PHP

var script = document.createElement("script");
script.type = "text/javascript";
script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js";
document.body.appendChild(script);
//#endregion

//#region Show the items of the order 
function showOrderedItems(e) {
    var id = e.target.id;
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?id=" + id + "&showOrderItems=showOrderItems";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            var items = JSON.parse(this.responseText);
            var item = items.item;
            var html1 = "";
            for (var a = 0; a < item.length; a++) {
                var type = item[a].type;
                var size = item[a].size;
                var color = item[a].color;
                var price = item[a].price;
                var pocketSticker = item[a].pocket_sticker;
                var frontSticker = item[a].front_sticker;
                var backSticker = item[a].back_sticker;
                var url = identifyShirt(type, color);
                html1 +=
                    "<div class='container orderContainer'><div class='row'><div class='col-3 orderItem'><img src='" +
                    url +
                    "' width='90px'>";
                html1 +=
                    " </div><div class='col-5 orderItem'><div class='container'><div class='row'><div class='col'><div class='row'></div><div class='row'><p class='cartText'>POCKET</p></div>";
                html1 +=
                    " <div class='row'><img src='" +
                    pocketSticker +
                    "' alt='Empty'  width='30px'></div></div>";
                html1 +=
                    " <div class='col'><div class='row'><p class='cartText'>FRONT</p></div><div class='row'><img src='" +
                    frontSticker +
                    "' alt='Empty'  width='30px'></div>";
                html1 +=
                    " </div><div class='col'><div class='row'><p class='cartText'>BACK</p></div><div class='row'><img src='" +
                    backSticker +
                    "' alt='Empty'  width='30px'>";
                html1 +=
                    " </div></div></div></div></div><div class='col-4 orderText'><h4 id='cartProductHeader'>" +
                    type +
                    "</h4><p><span style='font-weight:bold;'>Size: </span>" +
                    size +
                    "<br /><span style='font-weight:bold;'>Price: </span>" +
                    price +
                    "$</p></div>";
                html1 += "</div></div>";
                html1 += "<br/>";
            }
            document.getElementById("showDrop").innerHTML = html1;
        }



    }
};

//#endregion



function shop() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?shop=shop";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            var items = JSON.parse(this.responseText);
            var item = items.item;
            var html1 = "";
            for (var a = 0; a < item.length; a++) {
                var type = item[a].type;
                var size = item[a].size;
                var color = item[a].color;
                var price = item[a].price;
                var pocketSticker = item[a].pocket_sticker;
                var frontSticker = item[a].front_sticker;
                var backSticker = item[a].back_sticker;
                var url = identifyShirt(type, color);
                html1 +=
                    "<div class='container orderContainer'><div class='row'><div class='col-3 orderItem'><img src='" +
                    url +
                    "' width='90px'>";
                html1 +=
                    " </div><div class='col-5 orderItem'><div class='container'><div class='row'><div class='col'><div class='row'></div><div class='row'><p class='cartText'>POCKET</p></div>";
                html1 +=
                    " <div class='row'><img src='" +
                    pocketSticker +
                    "' alt='Empty'  width='30px'></div></div>";
                html1 +=
                    " <div class='col'><div class='row'><p class='cartText'>FRONT</p></div><div class='row'><img src='" +
                    frontSticker +
                    "' alt='Empty'  width='30px'></div>";
                html1 +=
                    " </div><div class='col'><div class='row'><p class='cartText'>BACK</p></div><div class='row'><img src='" +
                    backSticker +
                    "' alt='Empty'  width='30px'>";
                html1 +=
                    " </div></div></div></div></div><div class='col-4 orderText'><h4 id='cartProductHeader'>" +
                    type +
                    "</h4><p><span style='font-weight:bold;'>Size: </span>" +
                    size +
                    "<br /><span style='font-weight:bold;'>Price: </span>" +
                    price +
                    "$</p></div>";
                html1 += "</div></div>";
                html1 += "<br/>";
            }
            document.getElementById("shop").innerHTML = html1;
        }




    };

}
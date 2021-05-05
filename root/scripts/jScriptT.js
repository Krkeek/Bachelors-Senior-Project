//#region Identify the right shirt (Used in the cart)
function identifyShirt(type, color) {
    if (type == "Tshirt") {
        if (color == "Black") {
            return "../../images/shirts/T-shirts/Black-Tshirt-Front";
        }
        if (color == "Charcoal-gray") {}

        if (color == "red") {
            return "../../images/shirts/T-shirts/Red-Tshirt-Front";
        }
        if (color == "Asphalt-gray") {
            return "../../images/shirts/T-shirts/Asphalt-gray-Tshirt-Front";
        }

        if (color == "Deep-navy") {
            return "../../images/shirts/T-shirts/Deep-navy-Tshirt-Front";
        }
        if (color == "Heather-blue") {
            return "../../images/shirts/T-shirts/Blue-Tshirt-Front";
        }
        if (color == "Heather-burgundy") {
            return "../../images/shirts/T-shirts/Burgundy-Tshirt-Front";
        }
        if (color == "Heather-gray") {
            return "../../images/shirts/T-shirts/Gray-Tshirt-Front";
        }
        if (color == "Heather-iceblue") {
            return "../../images/shirts/T-shirts/Ice-Tshirt-Front";
        }
        if (color == "Heather-oatmeal") {
            return "../../images/shirts/T-shirts/Oatmeal-Tshirt-Front";
        }
        if (color == "Kelly-green") {
            return "../../images/shirts/T-shirts/Kelly-green-Tshirt-Front";
        }
        if (color == "Olive-green") {
            return "../../images/shirts/T-shirts/Olive-green-Tshirt-Front";
        }
        if (color == "Pink") {
            return "../../images/shirts/T-shirts/Pink-Tshirt-Front";
        }
        if (color == "Purple") {
            return "../../images/shirts/T-shirts/Purple-Tshirt-Front";
        }
        if (color == "Royal-blue") {
            return "../../images/shirts/T-shirts/Royal-blue-Tshirt-Front";
        }
        if (color == "Steel-blue") {
            return "../../images/shirts/T-shirts/Steel-blue-Tshirt-Front";
        }
        if (color == "Steel-green") {
            return "../../images/shirts/T-shirts/Steel-green-Tshirt-Front";
        }
        if (color == "Teal") {
            return "../../images/shirts/T-shirts/Teal-Tshirt-Front";
        }

        if (color == "White") {
            return "../../images/shirts/T-shirts/White-Tshirt-Front";
        }
        if (color == "Yellow") {
            return "../../images/shirts/T-shirts/Yellow-Tshirt-Front";
        }
    }

    if (type == "Pullover") {
        if (color == "Black") {
            return "../../images/shirts/Pullovers/Black-Pullover-Front";
        }
        if (color == "Burgundy") {
            return "../../images/shirts/Pullovers/Burgundy-Pullover-Front";
        }
        if (color == "White") {
            return "../../images/shirts/Pullovers/White-Pullover-Front";
        }
        if (color == "navy") {
            return "../../images/shirts/Pullovers/Navy-Pullover-Front";
        }
        if (color == "Gray") {
            return "../../images/shirts/Pullovers/Gray-Pullover-Front";
        }
        if (color == "Red") {
            return "../../images/shirts/Pullovers/Red-Pullover-Front";
        }
    }
    if (type == "Hoodie") {
        if (color == "Demin") {
            return "../../images/shirts/Hoodies/Demin-Hoodie-Front";
        }
        if (color == "Charcoal-gray") {
            return "../../images/shirts/Hoodies/charcoal-gray-Hoodie-Front";
        }
        if (color == "Olive-green") {
            return "../../images/shirts/Hoodies/Olive-green-Hoodie-Front";
        }
        if (color == "Gray") {
            return "../../images/shirts/Hoodies/Gray-Hoodie-Front";
        }
        if (color == "Royal-blue") {
            return "../../images/shirts/Hoodies/Royal-blue-Hoodie-Front";
        }
        if (color == "White") {
            return "../../images/shirts/Hoodies/White-Hoodie-Front";
        }
        if (color == "Burgundy") {
            return "../../images/shirts/Hoodies/Burgundy-Hoodie-Front";
        }
        if (color == "Black") {
            return "../../images/shirts/Hoodies/Black-Hoodie-Front";
        }
        if (color == "Navy") {
            return "../../images/shirts/Hoodies/Navy-Hoodie-Front";
        }
        if (color == "Red") {
            return "../../images/shirts/Hoodies/Red-Hoodie-Front";
        }
    }
}
//#endregion

//#region Clear the error message when hovered
function clearError(id) {
    document.getElementById(id).innerHTML = " ";
}
//#endregion
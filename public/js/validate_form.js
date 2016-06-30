function validateTitle(field) {
    return (field == "") ? "Не введен заголовок.\n" : ""
}
function validateContent(field) {
    return (field == "") ? "Не введено содержание.\n" : ""
}
function validatePhoto(field) {
    if (field != "") {

    if (/\.(jpg|jpeg|bmp|png)$/.test(field)) {
        return "";
    }
    else
        return "Выбранный файл имеет не коректное расширение, выбирите файл с расширением (jpeg,bmp,png ).\n";
    } else return "";
}


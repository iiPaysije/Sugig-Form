function getUpdatedHTML() {
    var updatedHTML = document.documentElement.outerHTML;
    return updatedHTML;
}

function sendUpdatedHTMLToServer() {
    var updatedHTML = getUpdatedHTML();

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_mail.php', false);
    xhr.setRequestHeader('Content-Type', 'text/plain');
    xhr.send('html=' + updatedHTML);
}

document.getElementById('update').addEventListener('click', sendUpdatedHTMLToServer);
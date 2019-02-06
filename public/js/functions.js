//Initialize Jodit WYSIWYG Text Editor
$('textarea').each(function () {
    var editor = new Jodit("#editor");
});

$(document).ready(function() {
    $('div > img').addClass('img-fluid');
});
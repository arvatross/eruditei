//Initialize Jodit WYSIWYG Text Editor
$('textarea').each(function () {
    var editor = new Jodit("#editor");
});

//Add a responsive image class to course content's image
$(document).ready(function() {
    $('.courseContent img').addClass('img-fluid');
});
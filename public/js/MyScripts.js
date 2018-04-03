$('.ChangeArrow').click(function () {
    $(this).toggleClass('fa-angle-down');
});

function showReplies(tag) {
    var tag = $(tag);
    var parentP= tag.parent('p');
    parentP.next().fadeToggle();
}

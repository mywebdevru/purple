$(document).ready(function() 
{
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(function () {
    $('[data-toggle="popover"]').popover()
});

$(function () {
    $('input[type=file]').change(function () {
        var t = $(this).val();
        var labelText = 'File : ' + t.substr(12, t.length);
        $(this).prev('label').text(labelText);
    })
});

function view(n) {
    style = document.getElementById(n).style;
    style.display = (style.display == 'block') ? 'none' : 'block';
    style.transition = '600ms';
    document.querySelector(".form-rows").setAttribute("rows", "6");
    document.querySelector(".form-post").style.display = "flow-root";
};

function limitChars(textid, limit, infodiv) {
    var text = $('#' + textid).val();
    var textlength = text.length;
    if (textlength > limit) {
        $('#' + infodiv).html('Вам нельзя написать более чем ' + limit + ' символов!');
        $('#' + textid).val(text.substr(0, limit));
        return false;
    } else {
        $('#' + infodiv).html('Осталось ' + (limit - textlength) + ' символов.');
        return true;
    }
};

$(function () {
    $('#comment').keyup(function () {
        limitChars('comment', 20, 'charlimitinfo');
    })
});


    var oldText, newText; 
    $(".change_text").bind("dblclick", replaceHTML);
	 
	 
	$(document).on("click", ".btnSave", function(){
            newText = $(this).siblings("form")
                                .children(".editBox")
                                .val().replace(/"/g, "&quot;");
                                
            $(this).parent()
                    .html(newText)
                    .removeClass("noPad")                    
                    .bind("dblclick", replaceHTML);
        }); 
	
	$(document).on("click", ".btnDiscard", function(){
            $(this).parent()
                    .html(oldText)
                    .removeClass("noPad")
                    .bind("dblclick", replaceHTML);
        }); 
	
	function replaceHTML()
        {
            oldText = $(this).html()
                                .replace(/"/g, "&quot;");
            $(this).addClass("noPad")
                    .html("")
                    .html("<form><input type=\"text\" class=\"editBox\" value=\"" + oldText + "\" /> </form><a href=\"#\" class=\"btnSave\">Сохранить</a> <a href=\"#\" class=\"btnDiscard\">Отменить</a>")
                    .unbind('dblclick', replaceHTML);

        }
});
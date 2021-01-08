var
_ALERT_ = 'Alert',
_INFO_ = 'Info',
_CONFIRM_ = 'Confirmation',
_OK_ = 'Ok',
_CANCEL_ = 'Cancel';
var ajaxResp = function (resp) {
	if (resp) {
		if (resp.responseText) {
			if (resp.responseText.match(/Login/g)) {
				$.alert("Session expired, you need to login", login);
			}
			else {
				$.alert(resp.responseText);
			}
		}
		else if (resp.error) {
			$.alert(resp.error);
		}
		else if (resp.success) {
			return true;
		}
	}
	else {
		$.alert("Failed");
	}
	return false;
};
(function ($) {
    var $dialogBox, $dialogMsg;
    $(function () {
        $dialogBox = $("<div/>").appendTo(document.body).dialog({
            autoOpen: false,
            position: "center",
            minHeight: 150,
            minWidth: 300,
            modal: true
        });
        $dialogMsg = $("<div/>").appendTo($dialogBox);
        $dialogMsgText = $("<span/>").css("display", "inline-block").hide().appendTo(document.body);
        $progressBar = $("<div/>").appendTo(document.body).addClass("dialog-wait").dialog({
            modal: true,
            resizable: false,
            draggable: false,
            autoOpen: false,
            minHeight: 20,
            open: function (event, ui) {
                $(".ui-dialog-titlebar", $progressBar.dialog("widget")).hide();
            }
        });
    });
     
    $.msgBox = function(title, msg, onOk, OnCancel, buttons) {
        $dialogMsg.html(msg);
        $dialogMsgText.html(msg);
        if (!buttons) {
            var buttons = {};
            buttons[_OK_] = function() {
                $( this ).dialog("close");
                if (onOk) onOk();
            };
        }
        var h = $dialogMsgText.height() + 100;
        var w = $dialogMsgText.width();
        $dialogBox.dialog({
            title: title,
            buttons: buttons,
            width: w < 300 ? 300 : (w > 800 ? 800 : w),
            height: h < 150 ? 150 : (h > 400 ? 400 : h),
            open: function () { $($(this).dialog("widget").find("button").get(0)).focus(); },
            close: function() { if (OnCancel) OnCancel(); }
        }).dialog("open");
    };
    $.alert = function(msg, onOk) {
        $.msgBox(_ALERT_, msg, onOk);
    };
    $.info = function(msg, onOk) {
        $.msgBox(_INFO_, msg, onOk);
    };
    $.confirm = function (msg, onOk, OnCancel) {
        var buttons = {};
        buttons[_OK_] = function() {
            $( this ).dialog( "close" );
            if (onOk) onOk();
        };
        buttons[_CANCEL_] = function() {
            $( this ).dialog( "close" );
            if (OnCancel) OnCancel();
        };
        $.msgBox(_CONFIRM_, msg, onOk, OnCancel, buttons);
    }
    $.wait = function (msg) {
        if (msg) $progressBar.html(msg)
        $progressBar.dialog({
            width: $progressBar.width(),
            hight: $progressBar.height()
        }).dialog("open");
    }
    $.done = function () {
        $progressBar.dialog("close");
    }
    $.ui.dialog.prototype.sendToBack = function () {
        $(this).css('z-index', 90);
    }
    $.ui.dialog.prototype.bringToFront = function () {
        $(this).css('z-index', 110);
    }
})(jQuery);
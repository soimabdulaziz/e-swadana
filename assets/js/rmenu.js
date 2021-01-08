$('#ribbon')
    .append(
        ''
)

// hide bg options
var smartbgimage =
    "<h6 class='margin-top-10 semi-bold'>Background</h6><img src='template/backend_default/img/pattern/graphy-xs.png' data-htmlbg-url='template/backend_default/img/pattern/graphy.png' width='22' height='22' class='margin-right-5 bordered cursor-pointer'><img src='template/backend_default/img/pattern/tileable_wood_texture-xs.png' width='22' height='22' data-htmlbg-url='template/backend_default/img/pattern/tileable_wood_texture.png' class='margin-right-5 bordered cursor-pointer'><img src='template/backend_default/img/pattern/sneaker_mesh_fabric-xs.png' width='22' height='22' data-htmlbg-url='template/backend_default/img/pattern/sneaker_mesh_fabric.png' class='margin-right-5 bordered cursor-pointer'><img src='template/backend_default/img/pattern/nistri-xs.png' data-htmlbg-url='template/backend_default/img/pattern/nistri.png' width='22' height='22' class='margin-right-5 bordered cursor-pointer'><img src='template/backend_default/img/pattern/paper-xs.png' data-htmlbg-url='template/backend_default/img/pattern/paper.png' width='22' height='22' class='bordered cursor-pointer'>";
$("#smart-bgimages")
    .fadeOut();

$('#demo-setting')
    .click(function () {
        //console.log('setting');
        $('#ribbon .demo')
            .toggleClass('activate');
    })

/*
 * FIXED HEADER
 */
$('input[type="checkbox"]#smart-fixed-nav')
    .click(function () {
        if ($(this)
            .is(':checked')) {
            //checked
            $.root_.addClass("fixed-header");
            nav_page_height();
        } else {
            //unchecked
            $('input[type="checkbox"]#smart-fixed-ribbon')
                .prop('checked', false);
            $('input[type="checkbox"]#smart-fixed-navigation')
                .prop('checked', false);

            $.root_.removeClass("fixed-header");
            $.root_.removeClass("fixed-navigation");
            $.root_.removeClass("fixed-ribbon");

        }
    });

/*
 * FIXED RIBBON
 */
$('input[type="checkbox"]#smart-fixed-ribbon')
    .click(function () {
        if ($(this)
            .is(':checked')) {
            //checked
            $('input[type="checkbox"]#smart-fixed-nav')
                .prop('checked', true);

            $.root_.addClass("fixed-header");
            $.root_.addClass("fixed-ribbon");

            $('input[type="checkbox"]#smart-fixed-container')
                .prop('checked', false);
            $.root_.removeClass("container");

        } else {
            //unchecked
            $('input[type="checkbox"]#smart-fixed-navigation')
                .prop('checked', false);
            $.root_.removeClass("fixed-ribbon");
            $.root_.removeClass("fixed-navigation");
        }
    });


/*
 * FIXED NAV
 */
$('input[type="checkbox"]#smart-fixed-navigation')
    .click(function () {
        if ($(this)
            .is(':checked')) {

            //checked
            $('input[type="checkbox"]#smart-fixed-nav')
                .prop('checked', true);
            $('input[type="checkbox"]#smart-fixed-ribbon')
                .prop('checked', true);

            //apply
            $.root_.addClass("fixed-header");
            $.root_.addClass("fixed-ribbon");
            $.root_.addClass("fixed-navigation");

            $('input[type="checkbox"]#smart-fixed-container')
                .prop('checked', false);
            $.root_.removeClass("container");

        } else {
            //unchecked
            $.root_.removeClass("fixed-navigation");
        }
    });

/*
 * RTL SUPPORT
 */
$('input[type="checkbox"]#smart-rtl')
    .click(function () {
        if ($(this)
            .is(':checked')) {

            //checked
            $.root_.addClass("smart-rtl");

        } else {
            //unchecked
            $.root_.removeClass("smart-rtl");
        }
    });


/*
 * INSIDE CONTAINER
 */
$('input[type="checkbox"]#smart-fixed-container')
    .click(function () {
        if ($(this)
            .is(':checked')) {
            //checked
            $.root_.addClass("container");

            $('input[type="checkbox"]#smart-fixed-ribbon')
                .prop('checked', false);
            $.root_.removeClass("fixed-ribbon");

            $('input[type="checkbox"]#smart-fixed-navigation')
                .prop('checked', false);
            $.root_.removeClass("fixed-navigation");

            if (smartbgimage) {
                $("#smart-bgimages")
                    .append(smartbgimage)
                    .fadeIn(1000);
                $("#smart-bgimages img")
                    .bind("click", function () {
                        var $this = $(this);
                        var $html = $('html')
                        bgurl = ($this.data("htmlbg-url"));
                        $html.css("background-image", "url(" +
                            bgurl + ")");
                    })

                smartbgimage = null;
            } else {
                $("#smart-bgimages")
                    .fadeIn(1000);
            }


        } else {
            //unchecked
            $.root_.removeClass("container");
            $("#smart-bgimages")
                .fadeOut();
            // console.log("container off");
        }
    });

/*
 * REFRESH WIDGET
 */
$("#reset-smart-widget")
    .bind("click", function () {
        $('#refresh')
            .click();
        return false;
    });

/*
 * STYLES
 */
$("#smart-styles > a")
    .bind("click", function () {
        var $this = $(this);
        var $logo = $("#logo img");
        $.root_.removeClassPrefix('smart-style')
            .addClass($this.attr("id"));
        $logo.attr('src', $this.data("skinlogo"));
        $("#smart-styles > a #skin-checked")
            .remove();
        $this.prepend(
            "<i class='fa fa-check fa-fw' id='skin-checked'></i>"
        );
    });
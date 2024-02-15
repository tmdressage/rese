$(function () {
    $(".header__menu--button").on("click", function () {
        $(
            ".menu, .header__search, .header__menu--button, .header__menu--button-line, .review-read-button, .favorite, .favorite-button, favorite-button-notLogin, .tooltip"
        ).toggleClass("open");
    });
});

window.addEventListener("DOMContentLoaded", function () {
    $(function () {
        let favorite = $(".favorite-button");
        let favoriteShopId;

        favorite.on("click", function () {
            
            let $this = $(this);
            favoriteShopId = $this.data("shop-id");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: `/favorite/:${favoriteShopId}`,
                type: "POST",
                data: {
                    shop_id: favoriteShopId,
                },
            })
                .done(function () {
                    $this.toggleClass("isActive");
                    $this.toggleClass("notActive");
                })

                .fail(function () {
                    console.log("fail");
                });
        });
    });
});


$(function () {
    $(".tooltip").hide();
    $(".favorite").hover(
        function () {
            $(this).children(".tooltip").fadeIn("fast");
        },
        function () {
            $(this).children(".tooltip").fadeOut("fast");
        }
    );
});

$(function () {
    $(".tooltip").hide();
    $(".review_read").hover(
        function () {
            $(this).children(".tooltip").fadeIn("fast");
        },
        function () {
            $(this).children(".tooltip").fadeOut("fast");
        }
    );
});




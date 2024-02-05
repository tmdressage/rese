$(function () {
    $(".js-btn").on("click", function () {
        // js-btnクラスをクリックすると、
        $(
            ".menu, .btn, .btn-line, .review_read_button, .favorite_button,.tooltip,.header__search"
        ).toggleClass("open"); // メニューとバーガーの線にopenクラスをつけ外しする
    });
});

window.addEventListener("DOMContentLoaded", function () {
    $(function () {
        let favorite = $(".favorite_button");
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
    $(".card__content_favorite").hover(
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
    $(".card__content_review_read").hover(
        function () {
            $(this).children(".tooltip").fadeIn("fast");
        },
        function () {
            $(this).children(".tooltip").fadeOut("fast");
        }
    );
});




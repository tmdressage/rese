$(function () {
    $(".js-btn").on("click", function () {
        // js-btnクラスをクリックすると、
        $(
            ".menu, .btn, .btn-line,.review_read_button, .favorite_button, .tooltip, .reservation_content, .detail__reservation, .change__reservation, .review__reservation,.review_read__content"
        ).toggleClass("open"); // メニューとバーガーの線にopenクラスをつけ外しする
    });
});

window.addEventListener("DOMContentLoaded", function () {
    $(function () {
        let favorite = $(".favorite_button");
        let favoriteShopId;

        // ボタンがクリックされた時の処理
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
                    $this.toggleClass("notActive");
                    window.location.href = "/mypage";
                })

                .fail(function () {
                    console.log("fail");
                });
        });
    });
});

$(function () {
    var $input_time = $("#input_time");
    var $output_time = $("#output_time");
    $input_time.on("input", function () {
        var value = $input_time.val();
        $output_time.text(value);
    });
});

$(function () {
    var $input_date = $("#input_date");
    var $output_date = $("#output_date");
    $input_date.on("input", function () {
        var value = $input_date.val();
        $output_date.text(value);
    });
});

$(function () {
    var $input_number = $("#input_number");
    var $output_number = $("#output_number");
    $input_number.on("input", function () {
        var value = $input_number.val();
        $output_number.text(value + "人");
    });
});

$(function () {
    $(".tooltip").hide();
    $(".cancel").hover(
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
    $(".change").hover(
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
    $(".review").hover(
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




$(function () {
    $('input[name="review"]').on("change", function () {
        var result = $(this).val();
        console.log(result);
    });
});

$(function () {
    $(".comment").on("click", function () {
        var result = $(this).val();
        console.log(result);
    });
});

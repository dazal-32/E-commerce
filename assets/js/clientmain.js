function getcartval() {
    var da = 1;
    $.ajax({
        type: "POST",
        url: 'gcv.php',
        data: 'da=' + da,
        success: function(html) {
            document.getElementById("countCart").innerHTML = html;
        }
    });
}
var mybutton = document.getElementById("myBtn");

function searchbox() {
    var modal = document.getElementById("model");
    modal.style.display = "initial";
}

function searchboxhide() {
    var modal = document.getElementById("model");
    modal.style.display = "none";
}
window.onclick = function(event) {
    var modal = document.getElementById("model");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function toggler() {
    var nav = document.getElementById("navbar");
    var menu = document.getElementById("toggel");
    var close = document.getElementById("close");
    nav.style.transform = "translateX(0em)";
    menu.style.opacity = "0";
    close.style.display = "initial";
}

function hide() {
    var nav = document.getElementById("navbar");
    var menu = document.getElementById("toggel");
    var close = document.getElementById("close");
    nav.style.transform = "translateX(70em)";
    menu.style.opacity = "1";
    close.style.display = "none";
}

function showcat() {
    var hi = document.getElementById("hi");
    var btn1 = document.getElementById("btn1");
    var btn2 = document.getElementById("btn2");
    var list = document.getElementById("hii");
    hi.style.height = "9em";
    list.style.height = "8em";
    list.style.overflow = "auto";
    btn1.style.display = "none";
    btn2.style.display = "initial";
}

function hidecat() {
    var hi = document.getElementById("hi");
    var btn1 = document.getElementById("btn1");
    var btn2 = document.getElementById("btn2");
    var list = document.getElementById("hii");
    hi.style.height = "2em";
    btn2.style.display = "none";
    btn1.style.display = "initial";
    list.style.overflow = "hidden";
}
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function login() {
    var fswitch = document.getElementById("fswitch");
    var indicator = document.getElementById("indicator");
    fswitch.style.transform = "translateX(0%)";
    indicator.style.transform = "translateX(0%)";
}

function register() {
    var fswitch = document.getElementById("fswitch");
    var indicator = document.getElementById("indicator");
    fswitch.style.transform = "translateX(-50%)";
    indicator.style.transform = "translateX(100%)";
}

function myAjax(user_id = '', product_id = '') {
    var qty = 1;
    if (user_id == 0) {
        swal("Login First To Access Cart.", "", "warning").then(function() {
            window.location.href = "user_login_reg.php";
        });
    } else {
        $.ajax({
            type: "POST",
            url: 'manage_cart.php',
            data: 'user_id=' + user_id + '&product_id=' + product_id + '&qty=' + qty,
            success: function(html) {
                if (html == "Product is already in cart.") {
                    swal(html, "", "warning");
                } else {
                    swal(html, "", "success").then(function() {
                        getcartval();
                    });
                }
            }
        });
    }
}

function Delmart(cart_user_id = '', cart_product_id = '') {
    $.ajax({
        type: "POST",
        url: 'delcart.php',
        data: 'cart_user_id=' + cart_user_id + '&cart_product_id=' + cart_product_id,
        success: function(html) {

            swal(html, "", "success").then(function() {
                window.location.href = "cart.php";
            });
        }
    });
}

function Upmart(up_user_id = '', up_product_id = '') {
    var up_qty = jQuery("#" + up_product_id + "qty").val();
    $.ajax({
        type: "POST",
        url: 'update_my_cart.php',
        data: 'up_user_id=' + up_user_id + '&up_product_id=' + up_product_id + '&up_qty=' + up_qty,
        success: function(html) {
            swal(html).then(function() {
                window.location.href = "cart.php";
            });

        }
    });
}

function addorder(addtotal) {
    var addname = jQuery("#addname").val();
    var addhouse = jQuery("#addhouse").val();
    var addroad = jQuery("#addroad").val();
    var addpin = jQuery("#addpin").val();
    var addnum = jQuery("#addnum").val();
    var addcity = jQuery("#addcity").val();
    var addstate = jQuery("#addstate").val();
    var addpay = jQuery("#ch-select").val();

    if (addname == '') {
        swal("Enter Name", "", "warning");
        checkoutshow();
    } else if (addhouse == '') {
        swal("Enter House,Bulding Name", "", "warning");
        checkoutshow();
    } else if (addroad == '') {
        swal("Enter Road Name", "", "warning");
        checkoutshow();
    } else if (addpin == '') {
        swal("Enter Pincode", "", "warning");
        checkoutshow();
    } else if (addnum == '') {
        swal("Enter Mobile Number", "", "warning");
        checkoutshow();
    } else if (addcity == '') {
        swal("Enter City", "", "warning");
        checkoutshow();
    } else if (addstate == '') {
        swal("Enter State Name", "", "warning");
        checkoutshow();
    } else if (addpay == 'Select Payment Method') {
        swal("Select Payment Method", "", "warning");
        checkoutshow1();
    } else {
        if (addpay == "PayU") {
            $.ajax({
                type: "POST",
                url: 'set_session.php',
                data: 'addname=' + addname + '&addhouse=' + addhouse + '&addroad=' + addroad + '&addpin=' + addpin + '&addnum=' + addnum + '&addcity=' + addcity + '&addstate=' + addstate + '&addpay=' + addpay + '&addtotal=' + addtotal,
                success: function() {
                    window.location.href = "insert.php";
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: 'manage_order.php',
                data: 'addname=' + addname + '&addhouse=' + addhouse + '&addroad=' + addroad + '&addpin=' + addpin + '&addnum=' + addnum + '&addcity=' + addcity + '&addstate=' + addstate + '&addpay=' + addpay + '&addtotal=' + addtotal,
                success: function(html) {
                    swal(html, "", "success").then(function() {
                        window.location.href = "myorders.php";
                    });
                }
            });
        }
    }
}

function checkoutshow() {
    var checki = document.getElementById("check-i");
    var ch1 = document.getElementById("ch1");
    var ch2 = document.getElementById("ch2");
    var chli = document.getElementById("ch-li");
    checkouthide1();
    checki.style.height = "35em";
    chli.style.height = "35em";
    chli.style.overflow = "auto";
    ch1.style.display = "none";
    ch2.style.display = "initial";
}

function checkouthide() {
    var checki = document.getElementById("check-i");
    var ch1 = document.getElementById("ch1");
    var ch2 = document.getElementById("ch2");
    var chli = document.getElementById("ch-li");
    checki.style.height = "4em";
    ch2.style.display = "none";
    ch1.style.display = "initial";
    chli.style.overflow = "hidden";
}

function checkoutshow1() {
    var checki = document.getElementById("check-i1");
    var ch1 = document.getElementById("ch11");
    var ch2 = document.getElementById("ch21");
    var chli = document.getElementById("ch-li1");
    checkouthide();
    checki.style.height = "20em";
    chli.style.height = "20em";
    chli.style.overflow = "auto";
    ch1.style.display = "none";
    ch2.style.display = "initial";
}

function checkouthide1() {
    var checki = document.getElementById("check-i1");
    var ch1 = document.getElementById("ch11");
    var ch2 = document.getElementById("ch21");
    var chli = document.getElementById("ch-li1");
    checki.style.height = "4em";
    ch2.style.display = "none";
    ch1.style.display = "initial";
    chli.style.overflow = "hidden";
}

function addwish(wish_user_id = '', wish_product_id = '') {
    if (wish_user_id == 0) {
        swal("Login To Access Wishlist.", "", "warning").then(function() {
            window.location.href = "user_login_reg.php";
        });
    } else {
        $.ajax({
            type: "POST",
            url: 'manage_wishlist.php',
            data: 'wish_user_id=' + wish_user_id + '&wish_product_id=' + wish_product_id,
            success: function(html) {
                swal(html, "", "success");
            }
        });
    }
}

function Delwish(wish_user_id = '', wish_id = '') {
    $.ajax({
        type: "POST",
        url: 'del_wishlist.php',
        data: 'wish_user_id=' + wish_user_id + '&wish_id=' + wish_id,
        success: function(html) {
            swal(html).then(function() {
                window.location.href = "mywish.php";
            });
        }
    });
}

function otpbox() {
    var otp = document.getElementById("otp");
    var regmail = jQuery("#regmail").val();
    if (regmail == '') {
        swal("Please Enter Email Id.");
    } else {
        document.getElementById("verify").innerHTML = "Wait...";
        $.ajax({
            type: "POST",
            url: 'otp.php',
            data: 'regmail=' + regmail,
            success: function(html) {
                if (html == "exist") {
                    swal("Email Id Already Exist.").then(function() {
                        var otp = document.getElementById("otp");
                       otp.style.display = "none";
                    });
                } else {
                    swal(html).then(function() {
                        var otp = document.getElementById("otp");
                        otp.style.display = "initial";
                    });
                }
            }
        });
    }
}

function verifyotp() {
    var resotp = jQuery("#otps").val();
    jQuery('#dvr').attr('disabled', true);
    jQuery('#otps').attr('readonly', true);
    $.ajax({
        type: "POST",
        url: 'otpverify.php',
        data: 'resotp=' + resotp,
        success: function(html) {
            var otp = document.getElementById("otp");
            if (html == "ok" || html == "exist") {
                otp.style.display = "none";
                swal("Verified Seccessfully.", "", "success").then(function() {
                    jQuery('#verify').attr('disabled', true);
                    jQuery('#regmail').attr('readonly', true);
                    document.getElementById("verify").innerHTML = "Done";
                });
            } else if (html == "fail") {
                var otp = document.getElementById("otp");
                otp.style.display = "none";
                swal("Please Enter Correct OTP..", "", "warning").then(function() {
                    var otp = document.getElementById("otp");
                    otp.style.display = "initial";
                    jQuery('#dvr').attr('disabled', false);
                    jQuery('#otps').attr('readonly', false);
                });
            }
        }
    });
}

function resetvar() {
    getcartval();
    var d = 1;
    $.ajax({
        type: "POST",
        url: 'reset.php',
        data: 'd=' + d,
        success: function(html) {

        }
    });
}

function cnclodr(id) {
    $.ajax({
        type: "POST",
        url: 'usercancel.php',
        data: 'id=' + id,
        success: function(html) {
            swal(html).then(function() {
                window.location.href = "myorders.php";
            });
        }
    });
}

var form_validation = function() {
    var e = function() {
            jQuery(".form-valide").validate({
                ignore: [],
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, a) {
                    jQuery(a).parents(".form-group > div").append(e)
                },
                highlight: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                },
                success: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                },
                rules: {
                    "email": {
                        required: !0,
                        minlength: 12,
                        maxlength: 50,
                    },
                    "password": {
                        required: !0,
                        minlength: 6,
                        maxlength: 30
                    },
                    "level": {
                        required: !0
                    },
                    "name": {
                        required: !0,
                        minlength: 3,
                        maxlength: 30
                    },
                    "description": {
                        required: !0
                    },
                    "brand_gps": {
                        required: !0,
                        minlength: 3,
                        maxlength: 50
                    },
                    "model_gps": {
                        required: !0,
                        minlength: 3,
                        maxlength: 50
                    },
                    "gps_name": {
                        required: !0,
                        minlength: 3,
                        maxlength: 50
                    },
                    "waranty_month": {
                        required: !0
                    },
                    "buy_date": {
                        required: !0
                    },
                    "sold_date": {
                        required: !0
                    },
                    "sold_to": {
                        required: !0,
                        minlength: 3,
                        maxlength: 30
                    },
                    "val-select2": {
                        required: !0
                    },
                    "val-select2-multiple": {
                        required: !0,
                        minlength: 2
                    },
                    "val-suggestions": {
                        required: !0,
                        minlength: 5
                    },
                    "val-skill": {
                        required: !0
                    },
                    "val-currency": {
                        required: !0,
                        currency: ["$", !0]
                    },
                    "val-website": {
                        required: !0,
                        url: !0
                    },
                    "val-phoneus": {
                        required: !0,
                        phoneUS: !0
                    },
                    "val-digits": {
                        required: !0,
                        digits: !0
                    },
                    "val-number": {
                        required: !0,
                        number: !0
                    },
                    "val-range": {
                        required: !0,
                        range: [1, 5]
                    },
                    "val-terms": {
                        required: !0
                    }
                },
                messages: {
                    "email": {
                        required: "Email tidak boleh kosong!",
                        minlength: "Email minimal 12 karakter huruf",
                        maxlength: "Email maksimal 50 karakter huruf",
                    },
                    "password": {
                        required: "Password tidak boleh kosong!",
                        minlength: "Password minimal 6 karakter huruf",
                        maxlength: "Password minimal 30 karakter huruf"
                    },
                    "level": "Level tidak boleh kosong!",
                    "name": {
                        required: "Nama tidak boleh kosong!",
                        minlength: "Nama minimal 3 karakter huruf",
                        maxlength: "Nama minimal 30 karakter huruf"
                    },
                    "description": "Deskripsi tidak boleh kosong!",
                    "brand_gps": {
                        required: "Brand GPS tidak boleh kosong!",
                        minlength: "Brand GPS minimal 3 karakter huruf",
                        maxlength: "Brand GPS minimal 50 karakter huruf"
                    },
                    "model_gps": {
                        required: "Model GPS tidak boleh kosong!",
                        minlength: "Model GPS minimal 3 karakter huruf",
                        maxlength: "Model GPS minimal 50 karakter huruf"
                    },
                    "gps_name": {
                        required: "Nama GPS tidak boleh kosong!",
                        minlength: "Nama GPS minimal 3 karakter huruf",
                        maxlength: "Nama GPS minimal 50 karakter huruf"
                    },
                    "waranty_month": {
                        required: "Garansi tidak boleh kosong!"
                    },
                    "buy_date": {
                        required: "Tanggal beli tidak boleh kosong!"
                    },
                    "sold_date": {
                        required: "Tanggal terjual tidak boleh kosong!"
                    },
                    "sold_to": {
                        required: "Nama pembeli tidak boleh kosong!"
                    },
                    "val-select2": "Please select a value!",
                    "val-select2-multiple": "Please select at least 2 values!",
                    "val-suggestions": "What can we do to become better?",
                    "val-skill": "Please select a skill!",
                    "val-currency": "Please enter a price!",
                    "val-website": "Please enter your website!",
                    "val-phoneus": "Please enter a US phone!",
                    "val-digits": "Please enter only digits!",
                    "val-number": "Please enter a number!",
                    "val-range": "Please enter a number between 1 and 5!",
                    "val-terms": "You must agree to the service terms!"
                }
            })
        }
    return {
        init: function() {
            e(), a(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init()
});
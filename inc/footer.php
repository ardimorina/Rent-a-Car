<footer class="main-footer">
    <div class="main-footer-content container">
        <div>
            <p>&copy; Rent a Car 2021. All rights reserved.</p>
        </div>
        <div class="social-media">
            <div>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>

</footer>
<script src="jquery-3.6.0.js"></script>
<script src="jquery.validate.min.js"></script>
<script>
    $().ready(function() {
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                fjalekalimi: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: {
                    required: "Please provide an email",
                    email: "Please enter a valid email address"
                }
            }

        });
        $("#shtokategori").validate({
            rules: {
                emri: {
                    required: true,
                },
                pershkrimi: {
                    required: true,
                    minlength: 5
                }
                kostoja: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                },
                pershkrimi: {
                    required: "Ju lutem shenoni pershkrimin",
                    minlength: "Pershkrimi juaj duhet te jet se paku 5 karaktere"
                }
                kostoja: {
                    required: "Ju lutem shenoni koston",
                    minlength: "Pershkrimi juaj duhet te jet se paku 3 karaktere"
                }
            }

        });
        $("#automjeti").validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 3
                },
                kategoria: {
                    required: true
                },
                nrregjistrimi: {
                    required: true
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere"
                },
                kategoria: {
                    required: "Ju lutem shenoni kategorin"
                },
                nrregjistrimi: {
                    required: "Ju lutem shenoni numrin e regjistrimit"
                }
            }
        });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
    });
</script>
</body>

</html>
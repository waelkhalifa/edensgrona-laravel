<header id="header"
        class="position- pt-0 navbar navbar-expand-lg navbar-end navbar-light navbar-show-hide navbar-untransitioned"
        data-hs-header-options='{
    "fixMoment": 1000,
    "fixEffect": "slide"
  }'>

    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap p-2">
            <!-- Default Logo -->
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>" aria-label="Front">
                <img class="navbar-brand-logo1 foo" src="<?php echo e(asset('assets/img/logo.jpg?v=1')); ?>" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation" style="margin-left:auto;">
                <span class="navbar-toggler-default active-nav">
                    <i class="fa-solid fa-bars"></i>
                </span>
                <span class="navbar-toggler-toggled active-nav">
                    <i class="bi-x"></i>
                </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="text-align: center;">
                <div class="navbar-absolute-top-scroller">
                    <ul class="navbar-nav navbar-nav-ul">
                        <!-- Landings -->
                        <li class="nav-item">
                            <a id="landingsMegaMenu"
                               class="nav-link myactive"
                               aria-current="page" href="<?php echo e(url('/')); ?>"
                               role="button"
                               aria-expanded="false">Hem</a>
                        </li>
                        <!-- End Landings -->

                        <!-- Account -->
                        <li class="nav-item nav-item-style" style="margin-left: 8px;">
                            <a id="contact"
                               class="hs-mega-menu-invoker nav-link-style nav-link"
                               href="<?php echo e(url('about-us')); ?>" role="button"
                               aria-expanded="false">Om oss</a>
                        </li>

                        <li class="nav-item nav-item-style">
                            <a class="nav-link nav-link-style"
                               href="https://www.google.com/search?sca_esv=14d9d936db00f47b&hl=en-SE&cs=1&sxsrf=AHTn8zoJlUzasRi-ICqysvcctUt4vZpdvA:1743361611994&si=APYL9bs7Hg2KMLB-4tSoTdxuOx8BdRvHbByC_AuVpNyh0x2KzeEUNrOJ9MbtQIWRt2ziQj5NwakjKvGSjkWStuNbvclVtkJvppnDqWHWZEx4Uom5CCY79_Tz8I_-HoTnX9F8Nj6wegqCWUJ5ZsNJEBLTX8xYLCI-QNbI0hZbnIgb0Xeqc0GeVLI%3D&q=Edens+Gr%C3%B6na+Tr%C3%A4dg%C3%A5rdsservice+AB+Reviews&sa=X&ved=2ahUKEwi-heSMwLKMAxXrFBAIHVRFA_QQ0bkNegQIMBAE&biw=1536&bih=791&dpr=1.25"
                               target="_blank">
                                Omdömen
                            </a>
                        </li>

                        <li class="nav-item nav-item-style">
                            <a class="nav-link nav-link-style" href="<?php echo e(url('contact-us')); ?>" role="button"
                               aria-expanded="false">Kontakt</a>
                        </li>
                        <!-- End Pages -->
                    </ul>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
<?php /**PATH /Users/waelkhalifa/Sites/edensgrona/resources/views/layouts/partials/header.blade.php ENDPATH**/ ?>
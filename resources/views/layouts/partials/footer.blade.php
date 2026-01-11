{{-- resources/views/layouts/partials/footer.blade.php --}}
<footer>
    <div class="container">
        <div class="row pt-7">
            <div class="col-md-4 col-sm-12">
                <h2 class="white">Edens Gröna Trädgårdsservice AB</h2>
                <p class="white">Org.nr. 559381-7520</p>
                <a class="white"
                   href="https://www.tirup.se/"
                   target="_blank">
                    Vi samarbetar med Tirups Örtagård
                    <i class="fa-solid fa-handshake-simple" style="color: #e4ca81;"></i>
                </a>
            </div>
            <div class="logo col-md-4 col-sm-12 text-center">
                <img class="footer-logo mb-sm-7" src="{{ asset('assets/img/logo.jpg') }}" alt="">
            </div>

            <div class="col-md-4 col-sm-12">
                <h5 class="mb-1 text-white">Kontakta oss</h5>
                <div class="text-white">
                    <b>Postadress</b>: Per Anders väg 1 24561 Staffanstorp
                    <br>
                    <b>Besöksadress</b>: Tirupsvägen 99, 245 93 Staffanstorp
                </div>
                <div class="text-white">
                    <b>E-post</b>:
                    <a href="mailto:info@edensgrona.se" class="white">
                        info@edensgrona.se
                    </a>
                </div>
                <div class="text-white">
                    <b>Mobil</b>:
                    <a href="tel:0760492828" class="white">
                        076-049 28 28
                    </a>
                </div>
            </div>
            <div class="mx-auto mt-6 d-none d-xs-none d-md-block"
                 style="max-width: 53rem; border-top: var(--whait) 1px solid;"></div>
            <span class="text-center small p-1" style="color: #ffffff7d;">
                Integritetspolicy och Cookie Inställningar. © {{ date('Y') }}
                <br>
                Utvecklad av
                <a class="text-white"
                   href="https://multicaret.com/en?utm_campaign=ClientsFooter&utm_medium=Links&utm_source=edensgrona.se"
                   target="_blank">
                    Multicaret Inc.
                </a>
            </span>
        </div>
    </div>
</footer>

<style>
    .site-footer .footer-overlay {
        background: linear-gradient(rgba(15, 23, 42, .85), rgba(15, 23, 42, .85));
    }

    .site-footer .footer-link {
        transition: all .3s ease;
    }

    .site-footer .footer-link:hover {
        color: #f97316;
        padding-left: 6px;
    }

    .site-footer .social-icon {
        display: inline-flex;
        width: 36px;
        height: 36px;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 9999px;
        color: #d1d5db;
        transition: color .3s ease, border-color .3s ease, background-color .3s ease, transform .3s ease;
    }

    .site-footer .social-icon:hover {
        color: #f97316;
        border-color: #f97316;
        background-color: rgba(255, 255, 255, .08);
        transform: translateY(-2px);
    }

    .site-footer .social-icon svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }

    .site-footer .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .site-footer .contact-item > svg {
        width: 17px;
        height: 17px;
        margin-top: 2px;
        flex: 0 0 auto;
        color: #f97316;
    }
</style>

<footer class="site-footer relative mt-10 text-white" style="background-image: url('{{ asset('images/footter.png') }}'); background-size: cover; background-position: center;">
    <div class="footer-overlay absolute inset-0"></div>
    <div class="relative mx-auto grid max-w-7xl gap-8 px-6 py-9 md:grid-cols-12 lg:gap-12">
        <div class="md:col-span-4">
            <h3 class="mb-3 text-xl font-semibold">Universitas Fort De Kock</h3>
            <p class="max-w-sm text-sm leading-relaxed text-gray-300">{{ __('ui.campus_description') }}</p>
        </div>

        <div class="grid grid-cols-2 gap-8 md:col-span-4">
            <div>
                <h4 class="mb-3 font-semibold">{{ __('ui.navigation') }}</h4>
                <div class="flex flex-col gap-2 text-sm text-gray-300">
                    <a href="/" class="footer-link">{{ __('ui.home') }}</a>
                    <a href="/prodi" class="footer-link">{{ __('ui.study_program') }}</a>
                    <a href="/contact" class="footer-link">{{ __('ui.contact') }}</a>
                    <a href="https://pmb.ufdk.ac.id" target="_blank" rel="noopener noreferrer" class="footer-link">{{ __('ui.registration') }}</a>
                </div>
            </div>

            <div>
                <h4 class="mb-3 font-semibold">{{ __('ui.information') }}</h4>
                <div class="flex flex-col gap-2 text-sm text-gray-300">
                    <a href="/akreditasi" class="footer-link">{{ __('ui.accreditation') }}</a>
                </div>
            </div>
        </div>

        <div class="md:col-span-4">
            <div class="mb-4 flex flex-wrap items-center gap-3">
                <h4 class="mr-1 font-semibold">{{ __('ui.contact_us') }}</h4>
                <div class="flex gap-2">
                    <a href="https://www.instagram.com/ufdkofficial?utm_source=ig_web_button_share_sheet&amp;igsh=ZDNlZDc0MzIxNw=="
                       target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Instagram UFDK" title="Instagram">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M7.8 2h8.4A5.81 5.81 0 0 1 22 7.8v8.4a5.81 5.81 0 0 1-5.8 5.8H7.8A5.81 5.81 0 0 1 2 16.2V7.8A5.81 5.81 0 0 1 7.8 2Zm-.2 2A3.6 3.6 0 0 0 4 7.6v8.8A3.6 3.6 0 0 0 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6A3.6 3.6 0 0 0 16.4 4H7.6Zm9.65 1.5a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"/>
                        </svg>
                    </a>
                    <a href="https://www.tiktok.com/@ufdkofficial?is_from_webapp=1&amp;sender_device=pc"
                       target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="TikTok UFDK" title="TikTok">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M16.6 2c.2 1.7 1.16 3.13 2.57 4.03A6.63 6.63 0 0 0 22 7v3.17a9.69 9.69 0 0 1-5.4-1.65v7.68A5.8 5.8 0 1 1 11.58 10v3.2a2.68 2.68 0 1 0 1.9 2.56V2h3.12Z"/>
                        </svg>
                    </a>
                    <a href="https://youtube.com/@ufdkedutainment?si=FuGrMgDVKskOY7A9"
                       target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="YouTube UFDK" title="YouTube">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M23.5 6.2a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.51A3.02 3.02 0 0 0 .5 6.2 31.7 31.7 0 0 0 0 12a31.7 31.7 0 0 0 .5 5.8 3.02 3.02 0 0 0 2.12 2.14c1.88.51 9.38.51 9.38.51s7.5 0 9.38-.51a3.02 3.02 0 0 0 2.12-2.14A31.7 31.7 0 0 0 24 12a31.7 31.7 0 0 0-.5-5.8ZM9.6 15.6V8.4l6.23 3.6L9.6 15.6Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="space-y-3 text-sm leading-relaxed text-gray-300">
                <div class="contact-item">
                    <i data-lucide="mail" aria-hidden="true"></i>
                    <a href="mailto:info@fdk.ac.id" class="footer-link">info@fdk.ac.id</a>
                </div>
                <div class="contact-item">
                    <i data-lucide="phone" aria-hidden="true"></i>
                    <a href="tel:08116607100" class="footer-link">0811-6607-100</a>
                </div>
                <div class="contact-item">
                    <i data-lucide="map-pin" aria-hidden="true"></i>
                    <address class="max-w-md not-italic">
                        Jl. Soekarno Hatta No.11, Manggis Ganting, Kec. Mandiangin Koto Selayan,
                        Kota Bukittinggi, Sumatera Barat 26117
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10 py-3 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} Universitas Fort De Kock. {{ __('ui.all_rights_reserved') }}
    </div>
</footer>

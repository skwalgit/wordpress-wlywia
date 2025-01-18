<div class="footer-socialmedia col-md col-lg-4">
    <h3 class="mb-4">{{ __('Follow us', 'sage') }}</h3>
    <ul class="socialmedia list-unstyled row g-3 pt-3">
        @if ((is_preview() && $facebook = '#') || $facebook = get_field('facebook', 'option'))
            <li class="col-auto"><a href="{{ $facebook }}" class=""><i class="fab fa-square-facebook fs-3"></i></a></li>
        @endif

        @if ((is_preview() && $twitter = '#') || $twitter = get_field('twitter', 'option'))
            <li class="col-auto"><a href="#" class=""><i class="fab fa-square-twitter fs-3"></i></a></li>
        @endif

        @if ((is_preview() && $linkedin = '#') || $linkedin = get_field('linkedin', 'option'))
            <li class="col-auto"><a href="{{ $linkedin }}" class=""><i class="fab fa-linkedin fs-3"></i></a></li>
        @endif

        @if ((is_preview() && $instagram = '#') || $instagram = get_field('instagram', 'option'))
            <li class="col-auto"><a href="{{ $instagram }}" class=""><i class="fab fa-instagram fs-3"></i></a></li>
        @endif

        @if ((is_preview() && $youtube = '#') || $youtube = get_field('youtube', 'option'))
            <li class="col-auto"><a href="{{ $youtube }}" class=""><i class="fab fa-youtube fs-3"></i></a></li>
        @endif
    </ul>
</div>

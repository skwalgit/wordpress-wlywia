// import then needed Font Awesome functionality
import fontawesome from '@fortawesome/fontawesome';

// Import icons
import {
    faFacebook,
    faFacebookF,
    faSquareFacebook,
    faTwitter,
    faSquareTwitter,
    faLinkedin,
    faLinkedinIn,
    faInstagram,
    faSquareInstagram,
    faYoutube,
    faSquareYoutube,
} from '@fortawesome/free-brands-svg-icons';

import {
  faChevronRight,
  faChevronDown,
} from '@fortawesome/free-solid-svg-icons';
// import { faUserCircle } from '@fortawesome/free-regular-svg-icons';

// add the imported icons to the library
fontawesome.config.searchPseudoElements = true

fontawesome.library.add(
    faChevronRight,
    faChevronDown,
    faFacebook,
    faFacebookF,
    faSquareFacebook,
    faTwitter,
    faSquareTwitter,
    faLinkedin,
    faLinkedinIn,
    faInstagram,
    faSquareInstagram,
    faYoutube,
    faSquareYoutube,
    {
        prefix: 'fas',
        iconName: 'chevron-left',
        icon: [
            34,
            34,
            [],
            'f0e00',
            'M21.25 8.91513L13.1651 17L21.25 25.085L23.2532 23.0818L17.1714 17L23.2532 10.9183L21.25 8.91513Z',
        ],
    }
);

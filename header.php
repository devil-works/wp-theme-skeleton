<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="l-container">
      <header class="l-header">
      <?php if (is_front_page()) : ?>
        <div class="l-header__inner">
          <a href="/" class="l-header__logo" aria-label="TOPへ戻る">
            <div class="l-header__logo-image">
              <svg
                class="l-header__logo-icon"
                version="1.0"
                xmlns="http://www.w3.org/2000/svg"
                width="100%"
                height="100%"
                viewBox="0 0 320.000000 320.000000"
                preserveAspectRatio="xMidYMid meet"
              >
                <g
                  transform="translate(0.000000,320.000000) scale(0.100000,-0.100000)"
                  fill="#333"
                  stroke="none"
                >
                  <path
                    d="M965 2059 c-346 -395 -643 -735 -659 -755 l-29 -36 30 4 c26 3 86 66
                    429 458 219 250 501 572 627 715 125 143 232 260 237 260 5 0 80 -81 167 -180
                    368 -421 1077 -1231 1088 -1243 7 -8 24 -12 39 -10 24 3 7 24 -217 280 -133
                    152 -429 490 -657 752 -228 261 -417 475 -420 475 -3 0 -288 -324 -635 -720z"
                    class="svg-elem-1"
                  ></path>
                  <path
                    d="M995 1973 c-330 -377 -601 -689 -603 -694 -2 -5 7 -9 21 -9 20 0 132
                    122 603 660 318 363 581 660 584 660 3 0 266 -297 583 -660 468 -533 583 -660
                    603 -660 13 0 24 3 24 6 0 7 -1200 1378 -1209 1381 -3 1 -276 -306 -606 -684z"
                    class="svg-elem-2"
                  ></path>
                  <path
                    d="M1227 2102 c-9 -10 -14 -22 -10 -25 3 -4 42 -7 85 -7 l78 0 0 -65 0
                    -65 -105 0 -105 0 0 -335 0 -335 95 0 c88 0 95 2 95 20 0 17 -8 19 -67 22
                    l-68 3 -3 288 -2 287 380 0 380 0 -2 -287 -3 -288 -72 -3 c-65 -3 -73 -5 -73
                    -22 0 -19 7 -20 100 -20 l100 0 -2 333 -3 332 -102 3 -103 3 0 64 0 65 80 0
                    c59 0 80 3 80 13 0 29 -25 37 -117 37 l-93 0 0 -90 0 -91 -72 3 -73 3 -3 88
                    c-2 78 -5 87 -22 87 -17 0 -20 -9 -22 -87 l-3 -88 -72 -3 -72 -3 -3 88 -3 88
                    -91 3 c-78 2 -93 0 -107 -16z"
                    class="svg-elem-3"
                  ></path>
                  <path
                    d="M1320 1635 l0 -175 130 0 130 0 0 -50 c0 -49 1 -50 30 -50 25 0 30
                    -4 30 -25 0 -24 -2 -25 -65 -25 -58 0 -65 -2 -65 -20 0 -19 7 -20 90 -20 l90
                    0 0 70 0 70 -30 0 c-25 0 -30 4 -30 25 l0 24 123 3 122 3 3 173 2 172 -25 0
                    -25 0 0 -150 0 -150 -100 0 c-99 0 -100 0 -100 24 0 23 4 25 53 28 l52 3 3
                    123 3 122 -141 0 -140 0 0 -100 c0 -100 0 -100 25 -100 23 0 24 3 27 78 l3 77
                    85 0 85 0 3 -77 3 -78 -56 0 -55 0 0 -50 0 -51 -107 3 -108 3 -3 148 c-2 139
                    -4 147 -22 147 -19 0 -20 -7 -20 -175z"
                    class="svg-elem-4"
                  ></path>
                  <path
                    d="M255 1173 c-19 -46 -19 -46 8 -80 32 -38 41 -65 25 -75 -23 -14 -114
                    -9 -128 7 -11 14 -15 14 -32 -2 -15 -14 -18 -24 -12 -48 4 -16 7 -59 7 -94 l1
                    -64 33 38 c18 21 33 44 33 51 0 16 40 35 154 74 l89 30 -7 -56 c-10 -88 -43
                    -135 -158 -224 -38 -28 -68 -56 -68 -61 0 -21 33 -5 126 64 54 40 113 81 129
                    91 38 24 55 49 78 108 18 46 18 49 -2 92 -24 56 -56 68 -99 38 -15 -12 -41
                    -24 -56 -28 l-28 -7 7 47 c7 45 6 47 -39 90 l-46 45 -15 -36z"
                    class="svg-elem-5"
                  ></path>
                  <path
                    d="M913 1181 c-10 -11 -26 -31 -37 -46 -10 -15 -47 -40 -82 -56 -35 -15
                    -64 -35 -64 -42 0 -12 6 -13 38 -2 20 7 51 16 67 19 l30 7 -3 -57 -4 -56 -97
                    6 c-82 6 -100 5 -110 -8 -24 -28 -5 -62 44 -81 45 -17 48 -17 97 4 65 27 78
                    27 78 -3 0 -46 -21 -80 -87 -143 -36 -35 -63 -66 -60 -69 13 -13 95 47 166
                    120 68 71 73 79 69 112 -4 33 -1 38 29 50 18 8 45 14 61 14 16 0 37 9 47 20
                    10 11 26 22 36 25 11 4 19 11 19 16 0 16 -78 10 -132 -11 -29 -11 -56 -20 -60
                    -20 -5 0 -8 16 -8 35 0 22 -6 38 -17 44 -17 10 -17 10 0 11 25 0 57 36 57 63
                    0 21 -36 67 -53 67 -4 0 -15 -9 -24 -19z"
                    class="svg-elem-6"
                  ></path>
                  <path
                    d="M2129 1171 c-22 -18 -24 -26 -22 -112 l1 -92 -100 7 c-86 5 -104 4
                    -119 -10 -17 -16 -16 -19 23 -65 50 -59 76 -63 145 -19 26 17 51 30 56 30 15
                    0 0 -99 -18 -127 -9 -13 -37 -39 -62 -56 -129 -89 -123 -107 13 -40 131 65
                    141 72 160 111 12 25 14 48 9 97 l-7 63 39 20 c21 11 56 24 77 27 21 4 40 13
                    42 20 3 7 18 15 35 19 43 8 35 22 -16 29 -36 5 -53 2 -87 -17 -24 -13 -54 -27
                    -67 -31 -23 -7 -24 -7 -17 49 6 44 4 62 -10 86 -21 35 -42 38 -75 11z"
                    class="svg-elem-7"
                  ></path>
                  <path
                    d="M1645 1090 c-21 -16 -44 -30 -52 -30 -8 0 -55 -14 -106 -31 -71 -24
                    -109 -31 -172 -31 -84 -1 -105 -9 -105 -39 0 -20 53 -59 79 -59 8 0 43 14 79
                    31 75 35 281 103 289 95 10 -10 -7 -54 -31 -83 -14 -16 -43 -42 -66 -58 -35
                    -24 -44 -26 -66 -17 -14 7 -37 12 -51 12 -24 0 -25 -2 -20 -36 10 -60 30 -81
                    82 -86 25 -3 54 -13 65 -23 18 -16 22 -16 72 1 43 14 49 19 33 25 -11 4 -29 8
                    -40 9 -11 0 -35 13 -53 29 -41 35 -41 35 108 107 96 46 110 57 110 78 0 36
                    -14 67 -49 104 -37 40 -58 40 -106 2z"
                    class="svg-elem-8"
                  ></path>
                  <path
                    d="M2934 1097 c-3 -9 2 -27 11 -41 14 -21 20 -24 37 -15 23 12 34 37 22
                    49 -5 5 -21 12 -36 15 -20 5 -29 3 -34 -8z"
                    class="svg-elem-9"
                  ></path>
                  <path
                    d="M2850 1057 c0 -42 44 -63 69 -33 20 24 -4 56 -39 56 -25 0 -30 -4
                    -30 -23z"
                    class="svg-elem-10"
                  ></path>
                  <path
                    d="M2570 1021 c-19 -11 -64 -46 -100 -79 -73 -68 -73 -81 4 -89 85 -10
                    106 0 159 77 27 39 52 70 58 70 12 0 42 -35 99 -117 45 -65 51 -70 141 -109
                    119 -53 147 -60 156 -38 3 9 -1 31 -10 48 -9 17 -25 54 -36 81 l-20 50 0 -51
                    c-1 -28 -3 -53 -6 -56 -9 -8 -101 16 -120 32 -10 8 -30 42 -45 75 -44 96 -88
                    125 -188 125 -35 -1 -70 -8 -92 -19z"
                    class="svg-elem-11"
                  ></path>
                </g>
              </svg>
              <div class="l-header__logo-text">総合表現学習道場</div>
            </div>
          </a>
        </div>
        <?php endif ?>
        <?php get_template_part('template-parts/component/mobile-nav-button'); ?>
        <?php get_template_part('template-parts/component/mobile-nav'); ?>
      </header>
	</div>
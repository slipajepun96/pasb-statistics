<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://fonts.cdnfonts.com/css/circular-std" rel="stylesheet"> --}}
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">

                

        <!-- Styles -->

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
        
        <style>
            body {
              font-family: 'Inter', sans-serif;
            }

            @media (min-width:1024px){
                .top-navbar{
                    display: inline-flex !important;
                }
            }
            /*
! tailwindcss v3.0.15 | MIT License | https://tailwindcss.com
*//*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

*,
::before,
::after {
  box-sizing: border-box; /* 1 */
  border-width: 0; /* 2 */
  border-style: solid; /* 2 */
  border-color: #e5e7eb; /* 2 */
}

::before,
::after {
  --tw-content: '';
}

/*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
*/

html {
  line-height: 1; /* 1 */
  -webkit-text-size-adjust: 80%; /* 2 */
  -moz-tab-size: 4; /* 3 */
  -o-tab-size: 4;
     tab-size: 4; /* 3 */
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; /* 4 */
}

/*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

body {
  margin: 0; /* 1 */
  line-height: inherit; /* 2 */
}

/*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

hr {
  height: 0; /* 1 */
  color: inherit; /* 2 */
  border-top-width: 1px; /* 3 */
}

/*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

abbr:where([title]) {
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
}

/*
Remove the default font size and weight for headings.
*/

h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

/*
Reset links to optimize for opt-in styling instead of opt-out.
*/

a {
  color: inherit;
  text-decoration: inherit;
}

/*
Add the correct font weight in Edge and Safari.
*/

b,
strong {
  font-weight: bolder;
}

/*
1. Use the user's configured `mono` font family by default.
2. Correct the odd `em` font sizing in all browsers.
*/

code,
kbd,
samp,
pre {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; /* 1 */
  font-size: 1em; /* 2 */
}

/*
Add the correct font size in all browsers.
*/

small {
  font-size: 80%;
}

/*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

table {
  text-indent: 0; /* 1 */
  border-color: inherit; /* 2 */
  border-collapse: collapse; /* 3 */
}

/*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

button,
input,
optgroup,
select,
textarea {
  font-family: inherit; /* 1 */
  font-size: 100%; /* 1 */
  line-height: inherit; /* 1 */
  color: inherit; /* 1 */
  margin: 0; /* 2 */
  padding: 0; /* 3 */
}

/*
Remove the inheritance of text transform in Edge and Firefox.
*/

button,
select {
  text-transform: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

button,
[type='button'],
[type='reset'],
[type='submit'] {
  -webkit-appearance: button; /* 1 */
  background-color: transparent; /* 2 */
  background-image: none; /* 2 */
}

/*
Use the modern Firefox focus style for all focusable elements.
*/

:-moz-focusring {
  outline: auto;
}

/*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

:-moz-ui-invalid {
  box-shadow: none;
}

/*
Add the correct vertical alignment in Chrome and Firefox.
*/

progress {
  vertical-align: baseline;
}

/*
Correct the cursor style of increment and decrement buttons in Safari.
*/

::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height: auto;
}

/*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

[type='search'] {
  -webkit-appearance: textfield; /* 1 */
  outline-offset: -2px; /* 2 */
}

/*
Remove the inner padding in Chrome and Safari on macOS.
*/

::-webkit-search-decoration {
  -webkit-appearance: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

::-webkit-file-upload-button {
  -webkit-appearance: button; /* 1 */
  font: inherit; /* 2 */
}

/*
Add the correct display in Chrome and Safari.
*/

summary {
  display: list-item;
}

/*
Removes the default spacing and border for appropriate elements.
*/

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}

fieldset {
  margin: 0;
  padding: 0;
}

legend {
  padding: 0;
}

ol,
ul,
menu {
  list-style: none;
  margin: 0;
  padding: 0;
}

/*
Prevent resizing textareas horizontally by default.
*/

textarea {
  resize: vertical;
}

/*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

input::-moz-placeholder, textarea::-moz-placeholder {
  opacity: 1; /* 1 */
  color: #9ca3af; /* 2 */
}

input:-ms-input-placeholder, textarea:-ms-input-placeholder {
  opacity: 1; /* 1 */
  color: #9ca3af; /* 2 */
}

input::placeholder,
textarea::placeholder {
  opacity: 1; /* 1 */
  color: #9ca3af; /* 2 */
}

/*
Set the default cursor for buttons.
*/

button,
[role="button"] {
  cursor: pointer;
}

/*
Make sure disabled buttons don't get the pointer cursor.
*/
:disabled {
  cursor: default;
}

/*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block; /* 1 */
  vertical-align: middle; /* 2 */
}

/*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

img,
video {
  max-width: 100%;
  height: auto;
}

/*
Ensure the default browser behavior of the `hidden` attribute.
*/

[hidden] {
  display: none;
}

*, ::before, ::after {
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}
.pagination {
  display: flex;
  justify-content: center;
  list-style: none;
  padding: 0;
}
.pagination .page-item .page-link {
  padding: .75rem;
  display: block;
  text-decoration: none;
  border-top-width: 1px;
  border-left-width: 1px;
  border-bottom-width: 1px;
  background-color: #ffffff;
  color: #2779BD;
}
.pagination .page-item .page-link:hover {
  background-color: #f1f5f8;
}
.pagination .page-item:first-child .page-link {
  border-top-left-radius: .25rem;
  border-bottom-left-radius: .25rem;
}
.pagination .page-item:last-child .page-link {
  border-right-width: 1px;
  border-top-right-radius: .25rem;
  border-bottom-right-radius: .25rem;
}
.pagination .page-item.active .page-link {
  background-color: #2779BD;
  border-color: #2779BD;
  color: #ffffff;
}
.pagination .page-item.disabled .page-link {
  background-color: #f1f5f8;
  color: #8795a1;
}
.visible {
  visibility: visible;
}
.fixed {
  position: fixed;
}
.relative {
  position: relative;
}
.top-0 {
  top: 0px;
}
.right-0 {
  right: 0px;
}
.z-0 {
  z-index: 0;
}
.m-3 {
  margin: 0.75rem;
}
.m-1 {
  margin: 0.25rem;
}
.m-2 {
  margin: 0.5rem;
}
.my-1 {
  margin-top: 0.25rem;
  margin-bottom: 0.25rem;
}
.my-2 {
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
}
.mx-auto {
  margin-left: auto;
  margin-right: auto;
}
.my-4 {
  margin-top: 1rem;
  margin-bottom: 1rem;
}
.my-3 {
  margin-top: 0.75rem;
  margin-bottom: 0.75rem;
}
.mx-1 {
  margin-left: 0.25rem;
  margin-right: 0.25rem;
}
.ml-1 {
  margin-left: 0.25rem;
}
.mb-2 {
  margin-bottom: 0.5rem;
}
.mb-4 {
  margin-bottom: 1rem;
}
.mr-4 {
  margin-right: 1rem;
}
.mr-3 {
  margin-right: 0.75rem;
}
.ml-auto {
  margin-left: auto;
}
.mt-2 {
  margin-top: 0.5rem;
}
.mr-2 {
  margin-right: 0.5rem;
}
.ml-2 {
  margin-left: 0.5rem;
}
.mt-4 {
  margin-top: 1rem;
}
.ml-4 {
  margin-left: 1rem;
}
.mt-8 {
  margin-top: 2rem;
}
.ml-12 {
  margin-left: 3rem;
}
.-mt-px {
  margin-top: -1px;
}
.ml-3 {
  margin-left: 0.75rem;
}
.-ml-px {
  margin-left: -1px;
}
.block {
  display: block;
}
.inline-block {
  display: inline-block;
}
.flex {
  display: flex;
}
.inline-flex {
  display: inline-flex;
}
.table {
  display: table;
}
.grid {
  display: grid;
}
.contents {
  display: contents;
}
.hidden {
  display: none;
}
.h-6 {
  height: 1.5rem;
}
.h-5 {
  height: 1.25rem;
}
.h-8 {
  height: 2rem;
}
.h-16 {
  height: 4rem;
}
.min-h-full {
  min-height: 100%;
}
.min-h-screen {
  min-height: 100vh;
}
.w-auto {
  width: auto;
}
.w-6 {
  width: 1.5rem;
}
.w-full {
  width: 100%;
}
.w-1\/2 {
  width: 50%;
}
.w-fit {
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
}
.w-5 {
  width: 1.25rem;
}
.w-8 {
  width: 2rem;
}
.w-3\/4 {
  width: 75%;
}
.w-1\/4 {
  width: 25%;
}
.max-w-sm {
  max-width: 24rem;
}
.max-w-6xl {
  max-width: 72rem;
}
.flex-none {
  flex: none;
}
.flex-1 {
  flex: 1 1 0%;
}
.flex-grow {
  flex-grow: 1;
}
.border-collapse {
  border-collapse: collapse;
}
.transform {
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.cursor-default {
  cursor: default;
}
.resize {
  resize: both;
}
.appearance-none {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}
.grid-cols-1 {
  grid-template-columns: repeat(1, minmax(0, 1fr));
}
.flex-row {
  flex-direction: row;
}
.flex-col {
  flex-direction: column;
}
.flex-wrap {
  flex-wrap: wrap;
}
.items-center {
  align-items: center;
}
.justify-center {
  justify-content: center;
}
.justify-between {
  justify-content: space-between;
}
.divide-x > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-x-reverse: 0;
  border-right-width: calc(1px * var(--tw-divide-x-reverse));
  border-left-width: calc(1px * calc(1 - var(--tw-divide-x-reverse)));
}
.overflow-hidden {
  overflow: hidden;
}
.overflow-x-auto {
  overflow-x: auto;
}
.rounded-xl {
  border-radius: 0.75rem;
}
.rounded-lg {
  border-radius: 0.5rem;
}
.rounded-md {
  border-radius: 0.375rem;
}
.rounded {
  border-radius: 0.25rem;
}
.rounded-l-md {
  border-top-left-radius: 0.375rem;
  border-bottom-left-radius: 0.375rem;
}
.rounded-r-md {
  border-top-right-radius: 0.375rem;
  border-bottom-right-radius: 0.375rem;
}
.border {
  border-width: 1px;
}
.border-y {
  border-top-width: 1px;
  border-bottom-width: 1px;
}
.border-t {
  border-top-width: 1px;
}
.border-green-900 {
  --tw-border-opacity: 1;
  border-color: rgb(20 83 45 / var(--tw-border-opacity));
}
.border-blue-900 {
  --tw-border-opacity: 1;
  border-color: rgb(30 58 138 / var(--tw-border-opacity));
}
.border-black {
  --tw-border-opacity: 1;
  border-color: rgb(0 0 0 / var(--tw-border-opacity));
}
.border-gray-300 {
  --tw-border-opacity: 1;
  border-color: rgb(209 213 219 / var(--tw-border-opacity));
}
.border-cyan-600 {
  --tw-border-opacity: 1;
  border-color: rgb(8 145 178 / var(--tw-border-opacity));
}
.border-gray-200 {
  --tw-border-opacity: 1;
  border-color: rgb(229 231 235 / var(--tw-border-opacity));
}
.border-gray-900 {
  --tw-border-opacity: 1;
  border-color: rgb(17 24 39 / var(--tw-border-opacity));
}
.border-r-black {
  --tw-border-opacity: 1;
  border-right-color: rgb(0 0 0 / var(--tw-border-opacity));
}
.bg-white {
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}
.bg-green-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(21 128 61 / var(--tw-bg-opacity));
}
.bg-gray-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(229 231 235 / var(--tw-bg-opacity));
}
.bg-red-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(220 38 38 / var(--tw-bg-opacity));
}
.bg-yellow-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 224 71 / var(--tw-bg-opacity));
}
.bg-cyan-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(22 78 99 / var(--tw-bg-opacity));
}
.bg-yellow-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(250 204 21 / var(--tw-bg-opacity));
}
.bg-cyan-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(8 145 178 / var(--tw-bg-opacity));
}
.bg-red-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(248 113 113 / var(--tw-bg-opacity));
}
.bg-green-600 {
  --tw-bg-opacity: 1;
  /* background-color: rgb(22 163 74 / var(--tw-bg-opacity)); */
  background-color: rgb(22,163,74);
}
.bg-cyan-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(34 211 238 / var(--tw-bg-opacity));
}
.bg-yellow-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(234 179 8 / var(--tw-bg-opacity));
}
.bg-red-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(239 68 68 / var(--tw-bg-opacity));
}
.bg-gray-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}
.bg-red-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(185 28 28 / var(--tw-bg-opacity));
}
.bg-cyan-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(14 116 144 / var(--tw-bg-opacity));
}
.bg-cyan-600\/50 {
  background-color: rgb(8 145 178 / 0.5);
}
.bg-green-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(34 197 94 / var(--tw-bg-opacity));
}
.bg-gray-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(209 213 219 / var(--tw-bg-opacity));
}
.bg-gradient-to-bl {
  background-image: linear-gradient(to bottom left, var(--tw-gradient-stops));
}
.from-cyan-800 {
  --tw-gradient-from: #155e75;
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgb(21 94 117 / 0));
}
.via-cyan-700 {
  --tw-gradient-stops: var(--tw-gradient-from), #0e7490, var(--tw-gradient-to, rgb(14 116 144 / 0));
}
.to-cyan-500 {
  --tw-gradient-to: #06b6d4;
}
.fill-current {
  fill: currentColor;
}
.p-3 {
  padding: 0.75rem;
}
.p-1\.5 {
  padding: 0.375rem;
}
.p-1 {
  padding: 0.25rem;
}
.p-2 {
  padding: 0.5rem;
}
.p-0\.5 {
  padding: 0.125rem;
}
.p-0 {
  padding: 0px;
}
.p-6 {
  padding: 1.5rem;
}
.px-3 {
  padding-left: 0.75rem;
  padding-right: 0.75rem;
}
.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}
.px-1 {
  padding-left: 0.25rem;
  padding-right: 0.25rem;
}
.py-1 {
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
}
.px-5 {
  padding-left: 1.25rem;
  padding-right: 1.25rem;
}
.px-2 {
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}
.py-4 {
  padding-top: 1rem;
  padding-bottom: 1rem;
}
.px-6 {
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}
.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}
.pt-8 {
  padding-top: 2rem;
}
.text-center {
  text-align: center;
}
.text-2xl {
  font-size: 1.5rem;
  line-height: 2rem;
}
.text-3xl {
  font-size: 1.875rem;
  line-height: 2.25rem;
}
.text-sm {
  font-size: 0.875rem;
  line-height: 1.25rem;
}
.text-lg {
  font-size: 1.125rem;
  line-height: 1.75rem;
}
.text-xl {
  font-size: 1.25rem;
  line-height: 1.75rem;
}
.text-base {
  font-size: 1rem;
  line-height: 1.5rem;
}
.font-bold {
  font-weight: 700;
}
.font-semibold {
  font-weight: 600;
}
.font-medium {
  font-weight: 500;
}
.italic {
  font-style: italic;
}
.leading-tight {
  line-height: 1.25;
}
.leading-7 {
  line-height: 1.75rem;
}
.leading-5 {
  line-height: 1.25rem;
}
.tracking-wide {
  letter-spacing: 0.025em;
}
.text-gray-700 {
  --tw-text-opacity: 1;
  color: rgb(55 65 81 / var(--tw-text-opacity));
}
.text-white {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}
.text-gray-500 {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}
.text-cyan-700 {
  --tw-text-opacity: 1;
  color: rgb(14 116 144 / var(--tw-text-opacity));
}
.text-gray-400 {
  --tw-text-opacity: 1;
  color: rgb(156 163 175 / var(--tw-text-opacity));
}
.text-black {
  --tw-text-opacity: 1;
  color: rgb(0 0 0 / var(--tw-text-opacity));
}
.text-gray-200 {
  --tw-text-opacity: 1;
  color: rgb(229 231 235 / var(--tw-text-opacity));
}
.text-gray-300 {
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity));
}
.text-gray-600 {
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity));
}
.text-gray-900 {
  --tw-text-opacity: 1;
  color: rgb(17 24 39 / var(--tw-text-opacity));
}
.text-cyan-600 {
  --tw-text-opacity: 1;
  color: rgb(8 145 178 / var(--tw-text-opacity));
}
.text-cyan-900 {
  --tw-text-opacity: 1;
  color: rgb(22 78 99 / var(--tw-text-opacity));
}
.text-red-500 {
  --tw-text-opacity: 1;
  color: rgb(239 68 68 / var(--tw-text-opacity));
}
.underline {
  -webkit-text-decoration-line: underline;
          text-decoration-line: underline;
}
.antialiased {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.shadow {
  --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-xl {
  --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-lg {
  --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-sm {
  --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.outline {
  outline-style: solid;
}
.outline-sky-500 {
  outline-color: #0ea5e9;
}
.ring-gray-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity));
}
.transition {
  transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
.duration-150 {
  transition-duration: 150ms;
}
.ease-in-out {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

.dropdown:hover .dropdown-menu {
    display: block;
  }

.hover\:bg-cyan-50:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(236 254 255 / var(--tw-bg-opacity));
}

.hover\:bg-cyan-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(14 116 144 / var(--tw-bg-opacity));
}

.hover\:bg-cyan-600:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(8 145 178 / var(--tw-bg-opacity));
}

.hover\:bg-cyan-400:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(34 211 238 / var(--tw-bg-opacity));
}

.hover\:bg-green-500:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(34 197 94 / var(--tw-bg-opacity));
}

.hover\:bg-yellow-400:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(250 204 21 / var(--tw-bg-opacity));
}

.hover\:bg-red-400:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(248 113 113 / var(--tw-bg-opacity));
}

.hover\:bg-gray-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(229 231 235 / var(--tw-bg-opacity));
}

.hover\:bg-red-600:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(220 38 38 / var(--tw-bg-opacity));
}

.hover\:bg-red-500:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(239 68 68 / var(--tw-bg-opacity));
}

.hover\:bg-green-400:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(74 222 128 / var(--tw-bg-opacity));
}

.hover\:from-cyan-600:hover {
  --tw-gradient-from: #0891b2;
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgb(8 145 178 / 0));
}

.hover\:via-cyan-500:hover {
  --tw-gradient-stops: var(--tw-gradient-from), #06b6d4, var(--tw-gradient-to, rgb(6 182 212 / 0));
}

.hover\:to-cyan-300:hover {
  --tw-gradient-to: #67e8f9;
}

.hover\:text-black:hover {
  --tw-text-opacity: 1;
  color: rgb(0 0 0 / var(--tw-text-opacity));
}

.hover\:text-white:hover {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.hover\:text-cyan-600:hover {
  --tw-text-opacity: 1;
  color: rgb(8 145 178 / var(--tw-text-opacity));
}

.hover\:text-gray-500:hover {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}

.hover\:text-gray-400:hover {
  --tw-text-opacity: 1;
  color: rgb(156 163 175 / var(--tw-text-opacity));
}

.hover\:underline:hover {
  -webkit-text-decoration-line: underline;
          text-decoration-line: underline;
}

.focus\:z-10:focus {
  z-index: 10;
}

.focus\:border-blue-300:focus {
  --tw-border-opacity: 1;
  border-color: rgb(147 197 253 / var(--tw-border-opacity));
}

.focus\:outline-none:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.focus\:ring:focus {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}

.active\:bg-gray-100:active {
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}

.active\:text-gray-700:active {
  --tw-text-opacity: 1;
  color: rgb(55 65 81 / var(--tw-text-opacity));
}

.active\:text-gray-500:active {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}

@media (min-width: 640px) {

  .sm\:flex {
    display: flex;
  }

  .sm\:hidden {
    display: none;
  }

  .sm\:flex-1 {
    flex: 1 1 0%;
  }

  .sm\:items-center {
    align-items: center;
  }

  .sm\:justify-between {
    justify-content: space-between;
  }
}

@media (min-width: 768px) {

  .md\:w-1\/6 {
    width: 16.666667%;
  }

  .md\:w-fit {
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
  }

  .md\:w-1\/3 {
    width: 33.333333%;
  }

  .md\:w-1\/12 {
    width: 8.333333%;
  }
}

@media (min-width: 1024px) {

  .lg\:ml-auto {
    margin-left: auto;
  }

  .lg\:inline-flex {
    display: inline-flex;
  }

  .lg\:hidden {
    display: none;
  }

  .lg\:w-auto {
    width: auto;
  }

  .lg\:flex-grow {
    flex-grow: 1;
  }

  .lg\:flex-row {
    flex-direction: row;
  }
}
  

        </style>
    
    </head>
    <?php   use \App\Http\Controllers\FFBYieldController; ?> 
<?php   use \App\Http\Controllers\DailyYieldController; ?> 
<body>
    <div class="m-3 bg-white w-auto rounded-xl p-3">
        <p class="text-2xl font-bold">Daily FFB Output for {{$data_array[6]}} {{$data_array[0]}}</p>
        {{-- <p class="italic text-gray-700">Last Updates: 18 January 2022</p> --}}
        {{-- <p>~Table here~</p> --}}
        <?php $o=1;
        // $no_of_estates=count($data_array[2]);
        $no_of_estates=100;
        for($a=0;$a<$no_of_estates;$a++)
        {
            // $cumulative_ffb_mt[$a][0]=$data_array[2][$a]->id; //put estate id 
            $cumulative_ffb_mt[$a][0]=0; //put 0 as initial mt
            $cumulative_ffb_mt[$a][1]=0; //put 0 as initial date
        }
        //var for cumulative total ffb by day
        $cumulative_total_ffb_by_day=0;
        //loop for all estate ffb cumulative
        for($b=1;$b<=31;$b++)
        {
            $cumulative_total_ffb[$b]=0;
           
        }
        ?>
    @foreach($data_array[8] as $ffbyield)
        <?php 
            $date=DateTime::createFromFormat("Y-m-j",$ffbyield->date);
            $day=$date->format("j");
            $ffb_array[$o][0]=$ffbyield->id;
            $ffb_array[$o][1]=$ffbyield->date;
            $ffb_array[$o][2]=$ffbyield->estate_id;
            $ffb_array[$o][3]=floatval($ffbyield->ffb_mt);
            $cumulative_total_ffb[$day]=$cumulative_total_ffb[$day]+$ffbyield->ffb_mt;
            
    
            for($a=0;$a<100;$a++)
            {
                if($a==(int)$ffbyield->estate_id)
                {
                    $cumulative_ffb_mt[$a][0]=(float)$cumulative_ffb_mt[$a][0]+(float)$ffbyield->ffb_mt;
                    $ffb_array[$o][4]=$cumulative_ffb_mt[$a][0];
                    $cumulative_ffb_mt[$a][1]=(float)$cumulative_ffb_mt[$a][1]+(float)$ffbyield->date;
                }
            }
    
            
            $o=$o+1;
        ?>
    @endforeach
    <?php //dd($cumulative_total_ffb);?>
    
        <div class="m-2 overflow-x-auto">
            <table class="border-collapse border border-green-900 w-full">
                <thead>
                    <tr class="bg-gray-200 p-3 font-bold">
                        <td width="3%" class="border border-blue-900 p-1 display-none text-sm" rowspan="3">Date</td>
                        <?php $i=0; ?>
                        @foreach($data_array[2] as $estate)
                            <td width="" class="border border-blue-900 p-1 text-sm" colspan="3" style="font-size: 0.8em;">{{$estate->estate_name}}</td>
                            <?php 
                            
                            $estate_numbering[$i]=$estate->id;
                            $i=$i+1;
                            ?>
                        @endforeach
                       
                        <td width="" class="border border-blue-900 p-1 text-sm" colspan="3" style="font-size: 0.875em;">Total</td>
                    </tr>
                    <tr class="bg-gray-200 p-3">
                        @for($i=0;$i<=$data_array[3];$i++)
                            <td width="" class="border border-blue-900 p-1 text-sm" colspan="2" style="font-size: 0.875em;">Actual</td>
                            <td width="" class="border border-blue-900 p-1 text-sm" colspan="1" style="font-size: 0.875em;">Budget</td>
                        @endfor
                    </tr>
                    <tr class="bg-gray-200 p-3">
                        @for($i=0;$i<=$data_array[3];$i++)
                            <td width="" class="border border-blue-900 p-1 text-sm" style="font-size: 0.875em;">Today</td>
                            <td width="" class="border border-blue-900 p-1 text-sm" style="font-size: 0.875em;">Todate</td>
                            <td width="" class="border border-blue-900 p-1 text-sm" style="font-size: 0.875em;">Todate</td>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @if($data_array[8]->count()==0)
                        <tr>
                            <td colspan=7> <p class="font-bold">ooh! Empty List </p>(contact administrator if you think this is an error)</td>
                        </tr>
                    @else
                    <?php 
                        $number_of_days=cal_days_in_month(CAL_GREGORIAN,$data_array[1],$data_array[0]);
                        $month_data_var=$data_array[5];
                        $cumulative_ffb_mt[]=0;
                    ?>
                    @for($j=1;$j<=$number_of_days;$j++)
                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-1 px-3" style="font-size: 0.875em;"><?php echo $j;?></td>
                            <?php $cumulative_daily_budget=0;?>
                            @for($k=0;$k<$data_array[3];$k++)
                                <?php $hit=0; ?>
                                @foreach($data_array[8] as $ffbyield)
                                    <?php 
                                        
                                        $date=DateTime::createFromFormat("Y-m-d",$ffbyield->date);
                                        $day=$date->format("d");
                                        // dd($day==$j&&$ffbyield->estate_id==$estate_numbering[$k]&&$k<$data_array[3]);
                                    ?>
                                    @if($j==$day&&$ffbyield->estate_id==$estate_numbering[$k])
                                        <?php $ffb_mt=$ffbyield->ffb_mt;
                                        $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days;
                                        $percentage=0;
                                        $percentage=$ffb_mt/$daily_budget*100;
                                        ?>
                                        @if($percentage>=0&&$percentage<80)
                                            <td style="background-color:rgb(220, 38, 38);color:#f1f5f8;font-size: 0.875em;">{{$ffbyield->ffb_mt}}</td>
                                        @elseif($percentage>=80&&$percentage<100)
                                            <td style="background-color:rgb(253, 224, 71);color:#000000;font-size: 0.875em;">{{$ffbyield->ffb_mt}}</td>
                                        @else
                                            <td style="background-color:rgb(21, 128, 61);color:#f1f5f8;font-size: 0.875em;">{{$ffbyield->ffb_mt}}</td>
                                        @endif
    
                                        <?php 
                                            $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days; 
                                            $cumulative_daily_budget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);
    
                                            $daily_ffbbudget=round($daily_budget*$j,2);
                                            
                                            
                                        ?>
    
                                        {{-- cumulative ffb mt --}}
    
                                        <?php 
                                            $number=(int)$ffbyield->id;
                                            $array_count=count($ffb_array);
                                            for($n=1;$n<=$array_count;$n++)
                                            {
                                                if($ffb_array[$n][0]==$ffbyield->id)
                                                {
                                                    
                                                    $float_cum_ffb_mt=floatval($ffb_array[$n][4]);
                                                    $percentage2=0;
                                                    $percentage2=($float_cum_ffb_mt/$daily_ffbbudget)*100;
                                                    ?>
                                                    @if($percentage2>=0&&$percentage2<80)
                                                        <td style="background-color:rgb(220, 38, 38);color:#f1f5f8;font-size: 0.875em;">{{$float_cum_ffb_mt}}</td>
                                                    @elseif($percentage2>=80&&$percentage2<100)
                                                        <td style="background-color:rgb(253, 224, 71);color:#000000;font-size: 0.875em;">{{$float_cum_ffb_mt}}</td>
                                                    @else
                                                        <td style="background-color:rgb(21, 128, 61);color:#f1f5f8;font-size: 0.875em;">{{$float_cum_ffb_mt}}</td>
                                                    @endif
                                                    {{-- original --}}
                                                    {{-- <td class="border border-gray-300 p-1"><!?php echo $float_cum_ffb_mt;?></td> --}}
                                                    <?php
                                                }
                                            }
                                        
                                        
                                        // $daily_ffbbudget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);
                                        
                                        ?>
                                        {{-- <td class="border border-gray-300 border-r-black p-1 "><//?php echo round($daily_budget*$j,2);?></td> --}}
                                        <?php $hit=$hit+1; ?>
                                    @endif
                                @endforeach
                                
                                @if($hit==0)
                                    <td class="border border-gray-300 p-1">-</td>
                                    <td class="border border-gray-300 p-1">-</td>
                                    <?php $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days; 
                                    // $daily_ffbbudget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);
                                     $cumulative_daily_budget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);?>
                                @endif
    
    
    
                                
                                
                                <td class="border border-gray-300 border-r-black p-1" style="font-size: 0.875em;"><?php echo round($daily_budget*$j,2);?></td>
                            @endfor
                            
    
                            {{-- total columns --}}
                            <?php
                            if($j==1)
                            {
                                $first_cum_ffb_budget=$cumulative_daily_budget;
                            }
                            $percentage3=0;
                            $percentage3=$cumulative_total_ffb[$j]/$first_cum_ffb_budget*100;
                            ?>
                                
                            @if($percentage3>=0&&$percentage3<80)
                                <td style="background-color:rgb(220, 38, 38);color:#f1f5f8;font-size: 0.875em;">{{$cumulative_total_ffb[$j]}}</td>
                            @elseif($percentage3>=80&&$percentage3<100)
                                <td style="background-color:rgb(253, 224, 71);color:#000000;font-size: 0.875em;">{{$cumulative_total_ffb[$j]}}</td>
                            @else
                                <td style="background-color:rgb(21, 128, 61);color:#f1f5f8;font-size: 0.875em;">{{$cumulative_total_ffb[$j]}}</td>
                            @endif        
              
                            {{-- cumulative total ffb by day --}}
                            <?php $cumulative_total_ffb_by_day=$cumulative_total_ffb_by_day+$cumulative_total_ffb[$j]; ?>
                            <?php
                            if($j==1)
                            {
                                $first_cum_ffb_budget=$cumulative_daily_budget;
                            }
                            $percentage4=0;
                            $percentage4=$cumulative_total_ffb_by_day/$cumulative_daily_budget*100;
                            ?>
                                
                            @if($percentage4>=0&&$percentage4<80)
                                <td style="background-color:rgb(220, 38, 38);color:#f1f5f8;font-size: 0.875em;">{{$cumulative_total_ffb_by_day}}</td>
                            @elseif($percentage4>=80&&$percentage4<100)
                                <td style="background-color:rgb(253, 224, 71);color:#000000;font-size: 0.875em;">{{$cumulative_total_ffb_by_day}}</td>
                            @else
                                <td style="background-color:rgb(21, 128, 61);color:#f1f5f8;font-size: 0.875em;">{{$cumulative_total_ffb_by_day}}</td>
                            @endif    
    
                            <td class="border border-gray-300 p-1" style="font-size: 0.875em;"><?php echo $cumulative_daily_budget;?></td>
                        </tr>
                        {{-- @endfor --}}
                        @endfor
                    @endif
                    {{-- <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-1 px-3">test</td>
                    </tr> --}}
                </tbody>
            </table>
     
            
        </div>
    </div>
</body>

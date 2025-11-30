<template>
  <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <!-- Baby head -->
    <circle cx="100" cy="100" r="55" fill="none" stroke="#f7bfcf" stroke-width="8"/>

    <!-- Baby eyes (gentle, small) -->
    <circle cx="85" cy="90" r="7" fill="none" stroke="#f7bfcf" stroke-width="6"/>
    <circle cx="115" cy="90" r="7" fill="none" stroke="#f7bfcf" stroke-width="6"/>

    <!-- Baby nose (soft curve) -->
    <path d="M100 105 C 98 110, 102 110, 100 115"
          fill="none" stroke="#f7bfcf" stroke-width="6" stroke-linecap="round"/>

    <!-- Baby mouth (small smile) -->
    <path d="M85 120 C 100 130, 115 130, 130 120"
          fill="none" stroke="#f7bfcf" stroke-width="6" stroke-linecap="round"/>

    <!-- Optional blush marks (cute touch) -->
    <circle cx="75" cy="115" r="8" fill="#f7bfcf" opacity="0.3"/>
    <circle cx="125" cy="115" r="8" fill="#f7bfcf" opacity="0.3"/>
  </svg>

</template>

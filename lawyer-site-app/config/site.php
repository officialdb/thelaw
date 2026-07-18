<?php

return [
    // Displayed name / title across the site
    'owner_name' => env('SITE_OWNER_NAME', 'Nnamdi Igwebuike Nwagwu, Esq.'),
    'owner_role' => env('SITE_OWNER_ROLE', 'Barrister & Solicitor'),

    // Phone as given, kept human-readable for display
    'phone_display' => env('SITE_PHONE_DISPLAY', '+234 707 015 7195'),

    // WhatsApp needs digits only, no + or spaces, with country code
    'whatsapp_number' => env('SITE_WHATSAPP_NUMBER', '2347070157195'),

    // Update once a real inbox exists
    'email' => env('SITE_EMAIL', 'chambers@nnamdinwagwu.com'),

    'address' => env('SITE_ADDRESS', '86 Wetheral Road, Owerri, Imo State'),
];

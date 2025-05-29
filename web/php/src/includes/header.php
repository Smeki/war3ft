<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($page_title) ? $page_title : 'War3FT Player Rankings'; ?></title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <link rel="stylesheet" href="layout.css">
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#4a9eff", secondary: "#1a1f3c" },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
  </head>
  <body class="min-h-screen text-white">
    <div class="container mx-auto px-4 py-8 min-h-screen flex flex-col">
      <header class="mb-8 text-center">
        <?php if (!empty($server_ip_port)): ?>
        <div class="flex justify-center items-center gap-2 mb-4">
          <a href="steam://connect/<?php echo htmlspecialchars($server_ip_port, ENT_QUOTES, 'UTF-8'); ?>" class="flex items-center gap-2 bg-[#1b2838] hover:bg-[#2a475e] text-white px-4 py-2 rounded-button transition-colors !rounded-button">
            <i class="ri-steam-fill text-lg"></i>
            <span>Join Server</span>
          </a>
        </div>
        <?php endif; ?>
      </header> 
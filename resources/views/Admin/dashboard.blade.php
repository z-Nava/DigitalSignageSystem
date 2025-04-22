<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Digital Signage System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradient-x {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .bg-animated {
            background: linear-gradient(-45deg,rgb(0, 255, 179),rgb(255, 255, 255),rgb(0, 255, 179),rgb(255, 0, 0));
            background-size: 400% 400%;
            animation: gradient-x 10s ease infinite;
        }
    </style>
</head>
<body class="bg-animated text-white flex items-center justify-center min-h-screen">
    <div class="text-center space-y-10 backdrop-blur-sm bg-black/40 p-10 rounded-xl shadow-xl">
       <h1>SOY ADMIN</h1>
    </div>
</body>
</html>

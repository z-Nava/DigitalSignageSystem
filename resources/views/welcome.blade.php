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
            background: linear-gradient(-45deg,rgb(255, 0, 0),rgb(0, 0, 0),rgb(0, 0, 0),rgb(255, 0, 0));
            background-size: 400% 400%;
            animation: gradient-x 10s ease infinite;
        }
    </style>
</head>
<body class="bg-animated text-white flex items-center justify-center min-h-screen">
    <div class="text-center space-y-10 backdrop-blur-sm bg-black/40 p-10 rounded-xl shadow-xl">
    <div class="flex justify-end mb-4">
            <button onclick="toggleFullScreen()"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded shadow">
                Pantalla Completa
            </button>
        </div>
        <img src="{{ asset('images/MW-LOGO-WHITE.png') }}" alt="Logo" class="w-32 h-32 mx-auto mb-6">
        <h1 class="text-4xl font-bold">Bienvenido al Sistema de Instrucciones</h1>
        <div class="flex flex-col md:flex-row items-center justify-center gap-10">
            <form method="GET" action="{{route('client.dashboard')}}">
                <input type="hidden" name="role" value="client">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-2xl font-semibold px-10 py-6 rounded-xl shadow-lg transition">
                    Soy Cliente
                </button>
            </form>
            <form method="GET" action="{{route('admin.dashboard')}}">
                <input type="hidden" name="role" value="admin">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white text-2xl font-semibold px-10 py-6 rounded-xl shadow-lg transition">
                    Soy Administrador
                </button>
            </form>
        </div>
    </div>
</body>
<script>
    function toggleFullScreen() {
        const docElm = document.documentElement;
        if (!document.fullscreenElement) {
            if (docElm.requestFullscreen) {
                docElm.requestFullscreen();
            } else if (docElm.webkitRequestFullscreen) { /* Safari */
                docElm.webkitRequestFullscreen();
            } else if (docElm.msRequestFullscreen) { /* IE11 */
                docElm.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }
</script>

</html>

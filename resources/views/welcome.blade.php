<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle Dark Mode</title>
    @vite('resources/css/app.css')
    <script>
        // Cek preferensi awal saat halaman dimuat
        const userTheme = localStorage.getItem('theme');
        const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches;

        function applyTheme(theme) {
            const htmlClasses = document.documentElement.classList;
            if (theme === 'dark') {
                htmlClasses.add('dark');
            } else if (theme === 'light') {
                htmlClasses.remove('dark');
            } else if (theme === 'system') {
                // Sesuaikan dengan preferensi sistem
                if (systemTheme) {
                    htmlClasses.add('dark');
                } else {
                    htmlClasses.remove('dark');
                }
            }
        }

        // Terapkan preferensi tema berdasarkan localStorage atau systemTheme saat halaman dimuat
        applyTheme(userTheme || 'system');

        // Fungsi untuk mengubah tema dan menyimpannya
        function changeTheme(theme) {
            localStorage.setItem('theme', theme);
            applyTheme(theme);
        }
    </script>

</head>

<body class="transition-all duration-300 bg-white dark:bg-gray-900 text-black dark:text-white">
    <div class="p-6">
        <h1 class="text-2xl font-bold">Pilih Tema</h1>
        <p>Silakan pilih mode tampilan:</p>
        <div class="mt-4">
            <button onclick="changeTheme('light')" class="px-4 py-2 bg-blue-500 text-white rounded">Light</button>
            <button onclick="changeTheme('dark')" class="px-4 py-2 bg-gray-700 text-white rounded">Dark</button>
            <button onclick="changeTheme('system')" class="px-4 py-2 bg-green-500 text-white rounded">System</button>
        </div>
    </div>
</body>

</html>
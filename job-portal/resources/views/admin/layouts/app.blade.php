<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | JobPortal</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <style>
        body{
            font-family:'Inter',sans-serif;
        }

        .sidebar-scroll::-webkit-scrollbar{
            width:5px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb{
            background:#334155;
            border-radius:20px;
        }
    </style>
</head>

<body class="bg-slate-100">

    <!-- Sidebar -->
    @include('admin.components.sidebar')

    <!-- Main Content -->
    <div class="ml-72 min-h-screen flex flex-col">

        <!-- Header -->
        @include('admin.components.header')

        <!-- Page Content -->
        <main class="flex-1">

            @if(session('success'))
                <div class="mx-8 mt-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mx-8 mt-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </main>

        <!-- Footer -->
        @include('admin.components.footer')

    </div>

    <!-- Optional JS -->
    <script>

        // Confirm Delete

        document.addEventListener('DOMContentLoaded', function () {

            const deleteForms =
                document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {

                form.addEventListener('submit', function(e) {

                    if (!confirm('Are you sure you want to delete this item?')) {
                        e.preventDefault();
                    }

                });

            });

        });

    </script>

</body>
</html>
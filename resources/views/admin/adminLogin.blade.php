<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="/images/logos/logoKP.png">
    <style>
        .input-animate {
            transition: background-color 400ms ease, border-color 400ms ease, box-shadow 400ms ease;
        }

        .input-animate:focus {
            background-color: #fff;
            border-color: #60a5fa; /* Tailwind blue-400 */
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.5);
        }
    </style>
</head>

<body class="grid place-items-center h-screen bg-sec-400">

    <div class="md:w-1/2 w-4/5 p-4 bg-white border border-gray-200 rounded-lg shadow">
        <form class="space-y-6" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <h5 class="mb-6 text-xl font-medium text-gray-900 dark:text-white">Sign in</h5>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" id="email" name="email" 
                    value="{{ old('email') ? old('email') : 'test_admin@email.com' }}"
                    class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5"
                    placeholder="test_admin@email.com">
                @error('email')
                    <span><strong class="text-red-500">{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" id="password" name="password" value="pass1234"
                    class="input-animate bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Demo for test: pass1234">
                @error('password')
                    <span><strong class="text-red-500">{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-pr-400 hover:bg-pr-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Login to admin dashboard
            </button>
        </form>
    </div>

    <!-- Reveal Password While Typing Script -->
    <script>
        const pwField = document.getElementById('password');
        let typingTimer;

        pwField.addEventListener('input', function () {
            pwField.type = 'text';

            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                pwField.type = 'password';
            }, 400);
        });
    </script>

</body>

</html>

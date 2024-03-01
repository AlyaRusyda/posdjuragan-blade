{{-- logout.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    {{-- Include any additional stylesheets or scripts here --}}
</head>
<body>
    {{-- Your page content here --}}
    <button id="logoutButton" type="button">Logout</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutButton = document.getElementById('logoutButton');
            if (logoutButton) {
                logoutButton.addEventListener('click', logoutUser);
            }
            console.log('Authorization');
            function logoutUser() {
                fetch('/api/cs/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('auth_token')}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Log the logout message
                    console.log(data.message);
                    // Clear auth_token from local storage
                    localStorage.removeItem('auth_token');

                    // Optionally, handle any post-logout actions here
                    // For example, update the UI to reflect that the user has logged out
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    </script>
</body>
</html>

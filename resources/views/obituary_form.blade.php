@extends('layouts.app')

<!DOCTYPE html>
<html>

<head>
    <title>Post Obituary</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        function validateForm() {
            const name = document.getElementById("name").value;
            const dob = document.getElementById("date_of_birth").value;
            const dod = document.getElementById("date_of_death").value;
            const content = document.getElementById("content").value;
            const author = document.getElementById("author").value;

            // Ensure date of death is after date of birth
            if (new Date(dod) <= new Date(dob)) {
                alert("Date of Death must be after Date of Birth.");
                return false;
            }

            // Ensure content length is within acceptable limits
            if (content.length < 20) {
                alert("Content must be at least 20 characters.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <h1 style="text-align: center;">Post an Obituary</h1>
    <div class="container">
        <form action="{{ route('submit_obituary') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div class="field" tabindex="1">
                <label for="name">
                    <i class="far fa-user"></i>Name
                </label>
                <input id="name" name="name" type="text" placeholder="e.g. john doe" required>
            </div>

            <div class="field" tabindex="2">
                <label for="date_of_birth">
                    <i class="far fa-calendar"></i>Date Of Birth
                </label>
                <input id="date_of_birth" name="date_of_birth" type="date" required>
            </div>

            <div class="field" tabindex="3">
                <label for="date_of_death">
                    <i class="far fa-calendar"></i>Date Of Death
                </label>
                <input id="date_of_death" name="date_of_death" type="date" required>
            </div>

            <div class="field" tabindex="4">
                <label for="content">
                    <i class="far fa-edit"></i>Content
                </label>
                <textarea id="content" name="content" placeholder="type here" required></textarea>
            </div>

            <div class="field" tabindex="5">
                <label for="author">
                    <i class="far fa-user"></i>Author
                </label>
                <input id="author" name="author" placeholder="type here" required>
            </div>

            <button type="submit">Post Obituary</button>
        </form>
    </div>
</body>

</html>
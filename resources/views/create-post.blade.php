<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        .post {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .post:last-child {
            border-bottom: none;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 5px 0 0;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
        <h1>User Panel</h1>
        <nav>
        <a href="{{route('user-login')}}" class="btn">Login</a>
        <a href="{{route('user-register')}}" class="btn">Sign Up</a>
        <a href="{{route('user-homepage')}}" class="btn">Home</a>
        <a href="{{route('my-post')}}" class="btn">My Posts</a>
        <a href="{{route('create-post')}}" class="btn">Create Post</a>
        </nav>
    </header>

   
    <!-- Create Post Page -->
    <div class="container" id="create-post">
        <h2>Create Post</h2>
        <form method="POST" action="{{route('add-create-post')}}">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn">Save</button>
        </form>
    </div>

   
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
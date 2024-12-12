<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Header and Navigation */
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        header nav ul {
            list-style-type: none;
        }

        header nav ul li {
            display: inline;
            margin: 0 15px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        /* Homepage Section */
        #homepage {
            padding: 20px;
            background-color: white;
            margin: 20px;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        .post-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .post {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .actions button {
            margin: 5px;
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .block-btn {
            background-color: #FF9800;
            color: white;
        }

        /* User Details Section */
        #user-details {
            padding: 20px;
            background-color: white;
            margin: 20px;
            border-radius: 5px;
        }

        .user-detail {
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 5px;
        }

        .user-detail button {
            background-color: #FF9800;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        /* Users Tab Section */
        #users {
            padding: 20px;
            background-color: white;
            margin: 20px;
            border-radius: 5px;
        }

        .user-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .user {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{route("admin-home")}}">Homepage</a></li>
                <li><a href="{{route("all-users")}}">Users</a></li>
            </ul>
        </nav>
    </header>
    @foreach ( $allpost as  $iAllpost)
    <section id="homepage">
        <h1>User Posts</h1>
        <div class="post-container">
            <div class="post">
                <h3>{{$iAllpost->title}}</h3>
                <div>{!! $iAllpost->description !!}</div>
                <div class="actions">
                    <a href="{{route('edit-post', ['id' => $iAllpost->id])}}" class="btn">Edit</a>
                    <a href="{{route('delete-post', ['id' => $iAllpost->id])}}" class="btn btn-danger">Delete</a>
                    <a href="{{route('block-post', ['id' => $iAllpost->id])}}" class="btn btn-danger">Block</a>
                </div>
            </div>
        </div>
    </section>

    @endforeach

 
    <footer>
        <p>&copy; 2024 Your Application</p>
    </footer>
</body>
</html>

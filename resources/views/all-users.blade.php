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

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scrolling if needed */
            background-color: rgba(0,0,0,0.4); /* Black with opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%; /* Adjust width */
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        
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
    <!-- Navigation Bar -->
    <header>
        <nav>
            <ul>
                <li><a href="{{route('admin-home')}}">Homepage</a></li>
                <li><a href="{{route('all-users')}}">Users</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- Users Tab Section -->
    <section id="users">
        <h1>All Users</h1>
        @foreach ($users as $iusers)
            <div class="user-list">
                <div class="user">
                    <p>{{$iusers->name}}</p>
                    <button class="view-btn">View Details</button>
                    <a href="{{route('block-user', ['id' => $iusers->id])}}" class="btn btn-danger">Block</a>

                </div>
            </div>
        @endforeach
    </section>

    <!-- Modal Section for User Details -->
    <div id="user-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <section id="user-details">
                <h1>View User Details</h1>
                <div class="user-detail">
                    <h3 id="user-name">User Name</h3>
                    <p id="user-email">Email: user@example.com</p>
                    <p id="join-date">Join Date: January 1, 2024</p>
                   
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Application</p>
    </footer>

    <script>
       
        var modal = document.getElementById("user-modal");

      
        var viewBtns = document.querySelectorAll(".view-btn");

        var closeBtn = document.getElementsByClassName("close-btn")[0];
        closeBtn.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    </script>
</body>
</html>

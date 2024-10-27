<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/globals.css">
   
</head>
<style>
    *{
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
    display: flex;
    font-family: Arial, sans-serif;
}
 
/* Horizontal navbar styling */
.horizontal-navbar {
    width: 100%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 10px 0;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    border-bottom: 2px solid #ddd;
}

.horizontal-navbar p {
    text-decoration: none;
    padding-top: 10px;
    padding-right: 30px;
    justify-content: flex-end;
}

/* Vertical navbar styling */
.navbar {
    width: 200px;
    height: 100vh;
    border-right: 2px solid #ddd;
    padding-top: 5px; /* Adds space for the horizontal navbar */
    justify-content: space-between;
}

.logo {
    text-align: center;
}

.logo img {
    width: 110px;
    height: 60px;
}

.nav-links {
    list-style: none;
    padding-left: 0;
}

.nav-links li {
    padding: 15px 20px;
}

.nav-links li a {
    text-decoration: none;
    font-size: 18px;
    display: flex;
    align-items: center;
}

.nav-links li a:hover {
    background-color: #ddd;
    border-radius: 5px;

}

.nav-links li a img{
     margin-right: 10px
}
        

.logout {
    padding-top: 400px;
    padding-left: 20px;
        }

.logout a {
    text-decoration: none;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 8px; /* Adjust gap as needed */
}


.logout a:hover {
    color: #f00;
}

.logout img{
    width: 25px;
    height: 25px;
}

/* Search Bar styling */      
.search-bar {
    display: flex;
    width: 100%;
    padding-top: 20px;
    padding-left: 170px;
    position: relative;
            
        }
.box{
    border: 2px solid black;
    border-width: thin;
    border-radius: 5px;
    padding-left: 5px;
    display: flex;
    align-items: center;

}
.box img{
    width: 25px;
    height: 25px;
    padding-bottom: 2px;
}

.search-bar input[type="search"] {
    width: 380px;
    max-width: 600px; /* Maximum width for larger screens */          
    border: none;
    outline: none;
    background-color: transparent;
    padding: 5px;
    font-size: 16px;
}

.content {
    padding: 20px;
    margin-left: 200px; /* Offset for the vertical navbar */
    margin-top: 60px; /* Offset for the horizontal navbar */
    width: 100%;
 }
</style>
<body>

 <!-- Horizontal navigation bar -->
 <div class="horizontal-navbar">
        <div class="search-bar">
            <div class="box">
            <img src="images/search.svg" alt="">
            <input type="search" placeholder="Search for anything...">
            </div>
        </div>
        <p>User</p>
    </div>

    
    <!-- Vertical navigation bar -->
    <div class="navbar">
        <div class="logo">
            <img src="images/ZENITHfd.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="#"> <img  src="images/category.svg" alt="">Home</a></li>
            <li><a href="#"> <img  src="images/task.svg" alt="">Task</a></li>
            <li><a href="#"> <img  src="images/setting-2.svg" alt="">Settings</a></li>
        </ul>
        <div class="logout">
           
            <a href="#"> <img src="images/logout.svg" alt=""> Log Out</a>
        </div>
    </div>

    <div class="content">
        
        <!-- Main content here -->
    </div>
</body>
</html>
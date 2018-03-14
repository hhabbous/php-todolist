<html>
<head>
    <title>TO-DO List</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>

<!-- This is the main container and "shell" for the todo app. -->
<div id="todo-app">
    <label class="todo-label" for="new-todo">What do you want to do today?</label>
    <input type="text" id="new-todo" class="todo-input"
           placeholder="buy milk">

    <ul id="todo-list"></ul>
    <div id="todo-stats"></div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>
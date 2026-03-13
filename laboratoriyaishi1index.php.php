<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<title>Fikr bildirish</title>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

<style>

body{
font-family: Arial;
margin:40px;
}

input, textarea{
width:300px;
padding:8px;
margin:5px 0;
}

button{
padding:10px 20px;
background:#3498db;
color:white;
border:none;
cursor:pointer;
}

#result{
margin-top:20px;
display:none;
padding:15px;
border-radius:5px;
}

.success{
background:#d4edda;
color:#155724;
}

.error{
background:#f8d7da;
color:#721c24;
}

</style>

</head>

<body>

<h2>Fikr bildirish formasi</h2>

<label>Ism:</label><br>
<input type="text" id="feedback_ism"><br>

<label>Email:</label><br>
<input type="email" id="feedback_email"><br>

<label>Baho (1-5):</label><br>
<input type="number" id="feedback_baho" min="1" max="5"><br>

<label>Mavzu:</label><br>
<input type="text" id="feedback_mavzu"><br>

<label>Fikr matni:</label><br>
<textarea id="feedback_matn"></textarea><br>

<button id="sendBtn">Yuborish</button>

<div id="result"></div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<style>
*{
padding:0;
margin:0;
top:0;
bottom:0;
}
body{
    margin:0;
    padding:0;
    font-family:sans-serif;
    background-color:rgb(2, 105, 28);
}
.mac{
    position:absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    width: 400px;
    padding:40px;
    background:rgba(0,0,0,0.8); 
    box-sizing:border-box;
    box-shadow:0 15px 25px rgba(0,0,0,0.5);
    border-radius: 10px;
}
.mac h2{
    margin:0 0 30px;
    padding:0;
    color:#fff;
    text-align:center;
}
.mac .input-box{
    position:relative;
}
.mac .input-box input{
    width:100%;
    padding: 10px 0;
    font-size:16px;
    letter-spacing:1px;
    color:#fff;
    margin-bottom:30px;
    border:none;
    border-bottom: 1px solid #fff;
    outline:none;
    background:transparent;
}
.mac .input-box label
{
    position:absolute;
    top:0;
    left:0;
    letter-spacing:1px;
    padding:10px 0;
    font-size:16px;
    color:#fff;
    pointer-events:none;
    transition: 0.5s;
}
.mac .input-box input:focus ~ label,
.mac .input-box input:valid ~ label
{
    top: -12px;
    left:0;
    color: #03a9f4;
    font-size:12px;
}
.mac input[type="submit"]
{
    background:transparent;
    border:none;
    outline:none;
    color:#fff;
    padding: 10px 20px;
    cursor:pointer;
    border-left: 1px solid #03a9f4;
    border-bottom: 1px solid #03a9f4;
    background:rgba(0,0,0,0);
    border-radius:5px;
}
.mac input[type="submit"]:hover{
    border-right: 1px solid #03a9f4;
    border-top: 1px solid #03a9f4;
}
.mssg{
    text-align:center;
    margin-top:10px;
    padding:4px;
    background: green;
    color:white;
}
</style>
</html>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>
*{
    padding:0;
    margin:0;
    top:0;
    bottom:0;
}
body{
    background-image: url(https://metricool.com/wp-content/uploads/jason-blackeye-364785-2.jpg) no-repeat center;
    width:100vw;
    height:100vh;
}
.main{
    margin-left:300px;
}
.main div{
    float:left;
    margin-top:300px;
    border: 1px solid gray;
    background:rgba(0,0,0,0.8);
    box-shadow:0 15px 25px rgba(0,0,0,0.7);
    transition: 2.5s;
}
.main div:hover{
    background: rgba(0, 0, 0, 0.534); 
    box-shadow:0 15px 25px rgba(0,0,0,0.5);
}
.main div:hover{
    transform: scale(1.1);
}
.main div button{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left:30px;
    padding-right:30px;
    margin: 50px;
}
.user{
    margin-left:120px;
    color:green;
    font-family:'Lucida Sans Unicode';
    font-size: 1.2em;
}
.admin{
    margin-left:100px; 
    color:rgb(45, 110, 231);
    font-family:'Lucida Sans Unicode';
    font-size: 1.2em;
}
.teacher{
    margin-left:90px; 
    color:rgb(214, 37, 14);
    font-family:'Lucida Sans Unicode';
    font-size: 1.2em;
}
</style>
</html>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<style>
body {
  background-color: #1f57db;
  font-family: source-sans-pro, sans-serif;
}

h1 {
  margin-left: auto;
  margin-top: 50px;
  text-align: center;
  font-weight: 100;
  font-size: 2.8em;
  color: #ffffff;
}
.mac{
    margin-top: 20%;
    text-align:center;
    transform: translate(40%,-40%);
    width:800px;
    position:absolute;
    background: rgba(0,0,0,0.8);
    box-sizing: border-box;
    box-shadow:0 15px 25px rgba(0,0,0,0.5);
    border-radius: 5px;
}
.mac form input{
  border:none;
  outline:none;
  border-bottom: 1px solid #fff;
  background:transparent;
  font-size:0.8em;
  color:#ffffff;
  font-family: sans-serif;
}
div {
  width: 500px;
  margin: auto;
}
p{
  font-size: 1.4em;
  font-weight: 100;
  color: #ffffff; 
}
.formStyle { 
  background-color: #1f57db;
  padding: 20px; 
  width: 460px; 
  margin-bottom: 20px; 
  border-bottom-width: 1px; 
  border-bottom-style: solid; 
  border-bottom-color: #ecf0f1; 
  border-top-style: none; 
  border-right-style: none; 
  border-left-style: none; 
  font-size: 1.4em;
  font-weight: 100;
  color: #ffffff;
}

#btn_des {
  float: right;
	background-color:#ffffff;
	display:inline-block;
	color:cyan;
	font-size:28px;
	font-weight: 500;
	padding:6px 24px;
  margin-top: 15px;
  margin-right: 60px;
	text-decoration:none;
}

#btn_des:hover {
	background-color: #6e8dd6;
  color:;
}

#btn_des:active {
	position:relative;
	top:3px;
}

/*To remove the outline that appears on clicking the input textbox*/
input:focus {
  outline: none;
}

/* To format the placeholder text color */
::-webkit-input-placeholder {
   color: #ecf0f1;
}

:-moz-placeholder { /* Firefox 18- */
   color: #ecf0f1;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #ecf0f1;  
}

:-ms-input-placeholder {  
   color: #ecf0f1;  
}
tr{
  font-size: 1.2em;
  font-weight: 100;
  color: #ffffff; 
}
.butt{
    float:right;
}
.butt button{
    width:240px;
    height:60px;
    font-weight:bold;
    font-size:1.2em;
    padding: 10px;
    background: rgb(168, 178, 235);
    border-radius: 10px;
    color:rgba(0,0,0,0.8);
}
.butt button:hover{
  background:rgba(0,0,0,0.8); 
  box-shadow:0 15px 25px rgba(0,0,0,0.5);
  color:rgb(168, 178, 235);
}
@media only screen and (max-width: 360px) {
  .mac{
      transform: translate(20%,-20%);
  }
}
</style>
<body>
</body>
</html>
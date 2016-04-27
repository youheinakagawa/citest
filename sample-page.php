<!doctype html>
<html>
<head>
<title>top</title>
</head>
<body>
<h3>input</h3>
<form action="res.php" method="post">
<!-- text -->
name:<input type="text" name="name" id="name"><br>
email:<input type="text" name="email" id="email"></br>

<!-- radio -->
gender:
 男：<input type="radio" name="gender" value="男" id="gender1">
 女：<input type="radio" name="gender" value="女" id="gender2"><br>
<!-- checkbox -->
media:
 Web:<input type="checkbox" name="web" value="Web" id="media1">
 TV:<input type="checkbox" name="TV" value="TV" id="media2"><br>

<!-- select -->
<select name="area" id="area">
    <option value="選択して下さい">選択して下さい</option>
    <option value="関東">関東</option>
    <option value="関西">関西</option>
</select><br>

<!-- textarea -->
ご意見:
<textarea id="note"></textarea><br>

<!-- hidden 対応できない -->
<input type="hidden" name="key" value="" id="key">

<!-- submit -->
<input type="submit" value="push" id="btn">

</form>
<!--script-->
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script>
$(function(){
    $("#btn").click(function(){
        if(confirm('いいですか？')){
            //何もしない（action先へ）
        }else{
            return false;
        }
    });
});
</script>
</body>
</html>
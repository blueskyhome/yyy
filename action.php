<?php
   //http://localhost/yyy/one.html?yourname=&suggestion=%09%09&submit=%E6%8F%90%E4%BA%A4
   $email = $_POST["email"];
   $password = $_POST["password"];
   $name = $_POST["yourname"];
   $sex = $_POST["sex"];
   $city = $_POST["city"];
   $othercity = $_POST["othercity"];
   $motto = $_POST["motto"];
   if($othercity){
      $selectCity = $othercity;
   }else{
   	  $selectCity = $city;
   }
   
   echo "用户注册成功,以下是具体的信息："."<br>";
   echo "电子邮件：".$email."<br>";
   echo "姓名：".$name."<br>";
   echo "性别：".$sex."<br>";
   echo "用户密码：".$password."<br>";
   echo "最想去的城市：".$selectCity."<br>";
   echo "你的兴趣有：";
   for($i=0;$i<count($_POST["interest"]);$i++){
   	 echo $_POST["interest"][$i]." ";
   }
   echo "<br>";
   if($motto){
      echo "个性签名为：".$motto."<br>";
   }else{
   	  echo "这个用户很懒还没有签名！"."<br>";
   }
   
   echo "你的头像："."<br>";
   // var_dump($_FILES); 
   // 区别于$_POST、$_GET,打印出一些基本信息（上传文件）
   $file = $_FILES["img"];
   if($file["error"] == 0){
   	 $typeArr = explode("/", $file["type"]);
   	 //判断文件是否是图片,typeArr长度为2，下标0为文件类型，下标1为后缀名
   	 if($typeArr[0] == "image"){
   	 	//图片的三种格式
        $picType = array("0"=>"png","1"=>"jpg","3"=>"jpeg");
        if(in_array($typeArr[1], $picType)){
        	//给上传的文件重命名
        	$picName = 'file/'.time().".".$typeArr[1];
        	$bol = move_uploaded_file($file["tmp_name"], $picName);
        	if($bol){
               
               echo '<img src="'.$picName.'"'  .'alt="上海鲜花港 - 郁金香" />';
            } else {
               echo "上传失败！";
            };
        }else{
        	echo "该图片格式不支持！";
        };
   	 }else{
          echo "该文件不是图片！";
   	 }
   }else{
          echo "上传失败！";
   }
?>
<?php 
session_start();
include '../CO.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SP in House</title>
<link rel="stylesheet" href="../SP.css"/>
<script>
function checkedC(){
	var x=0;
    var inputElements = document.getElementsByClassName('c');
	for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           x++;
           
      }
	}
	if(x==11){
		return true;}
		else{
			alert("please read all conditions");
		return false;}
	}   
      </script> 
<style>
.check{
colspan:2;
width:3%;}
.a{
width:47%;
text-align:right;}
th,td{
text-align:left;}
</style>
</head>
 <body>
<?php 
	
	$ID =$_SESSION['ID'];
	$name =$_SESSION['name'];
	$phone =$_SESSION['phone'];
	$pass = md5($_SESSION['pass']);
	$age = $_SESSION['age'];
	$college = $_SESSION['college'];
	$level = $_SESSION['level'];
	$email =$_SESSION['email'];
	$Ename =$_SESSION['Ename'];
	$relationship =$_SESSION['relationship'];
	$language =$_SESSION['language'];
	$Healthcare = $_SESSION['Healthcare'];
	$experience=$_SESSION['experience'];
	$SPP= $_SESSION['SPP'];
	$Ephone=$_SESSION['Ephone'];
	$MP=$_SESSION['MP'];
	$medication=$_SESSION['medication'];
	$allergy=$_SESSION['allergy'];
	$time=$_SESSION['time'];
    if(isset($_POST["reg"])){
		
		$sql1="INSERT INTO user(email, name, phone, password,age) VALUES ('$email','$name','$phone','$pass','$age')";
		$q1=mysqli_query($conn, $sql1);
		if($q1){
		$sql2="INSERT INTO student(email, universityID, college, level, experience,Ename, Erelationship, 	Ephone,language,healthcare,SP,time,healthProblem, medication, allergie) VALUES ('$email','$ID','$college','$level','$	experience','$Ename','$relationship','$Ephone','$language','$Healthcare','$SPP','$time','$MP','$medication','$allergy')";
		mysqli_query($conn, $sql2);
		header('location:information.php');
	}else{
		echo "<script>alert('Sorry, there are some errors please try again');</script>";}
	}
	
?>
 <!-- include header -->
 <?php include "../header/header.html" ?>

 <div id="container">
 <br/><br/><br/>
 <center>
	<form method="POST" onsubmit="return checkedC()" action="conditions.php">

	<table class="withoutBorder">
		<tr class="titleTable">
			<th colspan="4"style="text-align:center;">Terms and Conditions</th>
		</tr>
		<tr>
			<td colspan="2">Since the second party is qualified to work as Standardized Patient Accordingly, compliance with the following: </td>
			<td class="a" colspan="2">وحيث أن الطرف الثاني مؤهل للعمل كمريض معياري وعليه الالتزام بالبنود التالية </td>
		</tr>
		<tr>
			
			<td>Attend all required training session and simulation.</td>
			<td class="check"><input class="c" type="checkbox" name="condition[]" value="1" /></td>
			<td class="a">الإلتزام التام لحضور جميع الدورات والتدريبات المطلوبة </td>
			
		</tr>
		<tr>
			
			<td>If  you unable to attend training session or simulation, you  will contact the SP Specialist ASAP AT LEAST 2 DAYS so that he/she can find replacement.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="2" /></td>
			<td class="a">إذا لم أتمكن من الحضور لأي دورة تدريبية أو اختبار لأسباب خارجة عن إرادتي سوف أقوم بالاتصال بأخصائية برنامج المريض المعياري فوراً وقبل بداية الدورة بيومين ليتمكن من إيجاد البديل</td>
			
		</tr>
		<tr>
			
			<td>Arrive punctually for all appointment.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="3" /></td>
			<td class="a">الحضور دائما" في الوقت المحدد</td>
			
		</tr>
		
		<tr>
			
			<td>Compliance with all instructions given by the competent authorities before each training course.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="4" /></td>
			<td class="a">الإلتزام بجميع التعليمات المعطاة من قبل ذوي الاختصاص وذلك قبل كل دورة تدريبية </td>
		
		</tr>
		<tr>
			
			<td>In teaching situation, you  will provide feedback objectively and honestly as trained.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="5" /></td>
			<td class="a">	في حالة الدورات التعليمية، سوف أقدم ردود فعل بموضوعية وصدق</td>
			
		</tr>
		<tr>
			
			<td>Avoid contact with students “out of role” before or during the simulation.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="6"/></td>
			<td class="a">تجنب التواصل مع الطلاب\ الطالبات قبل أو أثناء الدورة او الامتحان</td>
		</tr>
		<tr>
			
			<td>Protect the privacy of the Students by not discussing their performance with anyone except those directly associated with project.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="7" /></td>
			<td class="a">الحفاظ على خصوصية الطلاب/ الطالبات من خلال عدم مناقشة أدائهم مع أي شخص باستثناء أخصائية برنامج المريض المعياري او الأطباء المرتبطين مباشرة مع المشروع</td>
			
		</tr>
		<tr>
			
			<td>Maintain the privacy of the information provided by not exchanging material or discussing it with anyone  from inside or outside the colleges associated with the project.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="8" /></td>
			<td class="a">الحفاظ على خصوصية المعلومات  المعطاة وذلك بعدم تبادل المواد أو مناقشتها مع أي شخص آخر من داخل أو خارج  الكليات المرتبطة بالمشروع</td>
			
		</tr>
		<tr>
			
			<td>Must complete all scheduled hours .</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="9"/></td>
			<td class="a">الإلتزام بالساعات المجدولة في كل امتحان او دوره تدريبيه </td>
		
		</tr>
		<tr>

			<td>You can refuse the role if you feel uncomfortable with topic immediately as soon as you receive the scenario.</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="10" /></td>
			<td class="a">لك الحق في رفض أي دور إذا شعرت بعدم الارتياح مع الموضوع المسند لك وذلك عند إستلام السيناريو مباشرةً </td>
			
		</tr>
		<tr>
			<td>Advance knowledge of the full schedule courses assigned to you</td>
			<td class="check"><input type="checkbox" class="c" name="condition[]" value="11" /></td>
			<td class="a">المعرفة المسبقة  بكامل  جداول الدورات المسندة لك</td>
			
		</tr>
		<tr >
			<td colspan="2" style="border-top: 1px solid #ddd">It records the mutual understanding and the agreement of the two parties regarding the work of the second party at the Simulation Center as Standardized Patient  under the following conditions : </td>
			<td class="a" colspan="2" style="border-top: 1px solid #ddd">وقد اتفق الطرفان على أن يعمل الطرف الثاني بمركز المحاكاة   كمريض معياري طبقاً للبنود التالية  </td>
		</tr>
		<tr>
			<td colspan="2"><u>ARTICLE  1: NATURE OF WORK </u></td>
			<td class="a" colspan="2"><u>البند الأول : طبيعة العمل</u></td>
		</tr>
		<tr>
			<td colspan="2">The second party shall work and perform the task(S) requested outside STUDYING  hours or when he/she has day off.</td>
			<td class="a" colspan="2">العمل المطلوب: تكون المهام المطلوب عملها مع المتعاقد خلال أوقات خارج الساعات الدراسية له او ايام الإجازة</td>
		</tr>
				<tr>
			<td colspan="2"><u>The second  ARTICLE:</u></td>
			<td class="a" colspan="2"><u>البند الثاني</u></td>
		</tr>
				<tr>
			<td colspan="2">Obtaining certified SKILL hours according to the table below</td>
			<td class="a" colspan="2">الحصول على ساعات مهارية معتمده بناءأ على الجدول الموضح ادناه</td>
		</tr>
	</table>
	</br>
	<table class="withBorder" style="width:80%"><tr class="titleTable"><th style="width:20%"><center>Work</center></th><th style="width:15%"></center>Hour<center></th><th style="width:15%"><center>Skills Hours</center></th><th style="width:15%"><center>تعادل( عدد الساعات المهارية)</center></th><th style="width:15%"><center>عدد الساعات المنفذة</center></th><th style="width:20%"><center> العمل</center></th></tr>
	<tr><th><center>History Taken</center></th><td></center>1Hour<center></td><td><center>2Skills Hours</center></td><td ><center>ساعة مهارية /2</center></td><td ><center>ساعة/1</center></td><th ><center> أخذ التاريخ المرضي</center></th></tr>
	<tr><th><center>Physical Examinations</center></th><td></center>1Hour<center></td><td><center>4Skills Hours</center></td><td ><center>ساعة مهارية /4</center></td><td ><center>ساعة/1</center></td><th ><center> الفحص السريري البدني</center></th></tr>
	<tr><th><center>Advance Physical Examinations</center></th><td></center>1Hour<center></td><td><center>6Skills Hours</center></td><td ><center>ساعة مهارية /6</center></td><td ><center>ساعة/1</center></td><th ><center>الفحص السريري البدني المتقدم</center></th></tr>
	</table>
	</br>
	
	
				<button class="but" type="submit" name="reg" >Agree </button> 
    <a href="../user/index.php"><button class="but" type="button" >Disagree</button></a>
	</form>
	
	</br>
	</br>
 </center>
 </div>
 </body>
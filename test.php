<html>
<body>
<?php
$subjectList = "172,173,174,175";
$subjID = "111";
if (strpos($subjectList, $subjID) !== false) {
                $semester = '1st Semester';
            }
else{
	$semester = "PUTANGINA";
}
echo $semester;

?>
</body>
</html>

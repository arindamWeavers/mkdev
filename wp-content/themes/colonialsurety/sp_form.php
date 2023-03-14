<?php 
if ( ! empty($_POST['name'])){
    $name = $_POST['name'];
}
$String = '
NJ.CityOfSomething.CreateWebsiteManagementUsers.v1
NJ.CityOfSomething.CreateWebsiteManagementUsers.v1
NJ.CityOfSomething.CreateWebsiteManagementUsers.v1
NJ.CityOfSomething.CreateWebsiteManagementUsers.v1
NJ.CityOfSomething.CreateWebsiteManagementUsers.v1
NJ.CityOfSomething.CreateWebsiteManagementUsers.v1
NJ.CityOfSomething.CreateWebsiteManagementUsers.v1
';
$list = explode("\n", $String);
print_r($list);
$i = 0;
while($i < count($list)) {
    print_r($list[$i]);
    $arr = explode(".", $list[$i]);
    echo "State: ".$arr[0]."<br>";
    echo "Obliegee: ".$arr[0].'<br>';
    $i++;
}


?>
<?php /*
<html>
<body>

<form name='form' method='post'>

List: <input type="text" name="name" id="name" ><br/>

<input type="submit" name="submit" value="Submit">  

</form>
</body>
</html>

*/ ?>
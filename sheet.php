$servername = "localhost";
$username = "root";
$password = "";
$datab = "test";


$conn = new mysqli($servername, $username, $password,$datab);
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags)
    {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
	
  if (isset($_POST["fname"])) 
  {
      $fname = $_POST["fname"];
	  $lname = $_POST["lname"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $date = $_POST["date"];
      $time = $_POST["time"]; 
      $adults = $_POST["adults"];
      $children = $_POST["children"];
      $stmt = $conn->prepare("INSERT INTO infos (Nom,Prenom, Email, Phone, DateR, TimeR, NbAdult, NbChild) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssii", $fname,$lname, $email, $phone, $date, $time, $adults, $children);
      $stmt->execute();
  }
}
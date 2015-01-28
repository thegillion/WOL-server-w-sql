<?php
	/*
	Remote Wake/Sleep-On-LAN Server [CONFIGURATION FILE]
	https://github.com/sciguy14/Remote-Wake-Sleep-On-LAN-Server
	Author: Jeremy E. Blum (http://www.jeremyblum.com)
	License: GPL v3 (http://www.gnu.org/licenses/gpl.html)
	
	UPDATE THE VALUES IN THIS FILE AND CHANGE THE NAME TO: "config.php"
	*/
    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: index.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to index.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can retrieve a list of members from the database using a SELECT query. 
    // In this case we do not have a WHERE clause because we want to select all 
    // of the rows from the database table. 
    $query = " 
        SELECT 
            devicename, 
            macaddress,
            ipaddress
        FROM devices 
    "; 
     
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll(); 

	foreach($rows as $row)
	$COMPUTER_NAME = $row['devicename'];
	$COMPUTER_MAC = $row['macaddress'];
	$COMPUTER_LOCAL_IP = $row['ipaddress'];
	
	
	//Choose a passphrase and find the sha256 hash of that passphrase.
	//You can use an online calculator to generate the hash: http://www.xorbin.com/tools/sha256-hash-calculator.
	//Unless you are using an SSL connection to your server, remember that passphrases could still be obtained via a man-in-the-middle attack.
	$APPROVED_HASH = "f69a5f4ee761a50c392d5b38fde27d9576cfcce3be4d2f21d799aef7622531bc";
	
	//This is the number of times that the WOL server will try to ping the target computer to check if it has woken up. Default = 10.
	$MAX_PINGS = 10;
	//This is the number of seconds to wait between pings commands when waking up or sleeping. Waking from shutdown or sleep will impact this.
	$SLEEP_TIME = 5;

	//This is the Port being used by the Windows SleepOnLan Utility to initiate a Sleep State
	//http://www.ireksoftware.com/SleepOnLan/
	$COMPUTER_SLEEP_CMD_PORT = 7760;
	//Command to be issued by the windows sleeponlan utility 
	//options are suspend, hibernate, logoff, poweroff, forcepoweroff, lock, reboot
	//You can create a windows scheduled task that starts sleeponlan.exe on boot with following startup parameters /auto /port=7760
	$COMPUTER_SLEEP_CMD = "suspend";
	
	//This is the location of the bootstrap style folder relative to your index and config file. Default = "" (Same folder as this file)
	//Directory must be called "bootstrap". You may wish to move if this WOL script is the "child" of a larger web project on your Pi, that will also use bootstrap styling.
	//If if it on directory up, for example, you would set this to "../"
	//Two directories up? Set too "../../"
	//etc...
	$BOOTSTRAP_LOCATION_PREFIX = "";
?>

<?php
session_start();
// Your PHP code that has to be executed every 2 minute comes here
require('connectdb.ext');

$sql = 'SELECT * FROM `users` WHERE `upayv` != "11"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$rowa = $result->fetch_assoc();
	$to_time = strtotime("now");
	$from_time = strtotime($rowa['acctime']);
	$ctime = round(abs($to_time - $from_time) / 60, 0);
	if ((60 - $ctime) < 0) {
		$conn->close();
		require("connectdb.ext");
		$sql1 = 'DELETE FROM `users` WHERE `email` = "' . $rowa['email'] . '"';
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			$conn->close();

			require('connectdb.ext');

			$sql2 = 'SELECT * FROM `users` WHERE `dpay1` = "' . $rowa['email'] . '"';
			$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0) {
				$rows = $result2->fetch_assoc();
				$conn->close();
				require("connectdb.ext");
				$sql3 = 'UPDATE `users` set `dpay1`= ""  WHERE `email` = "' . $rows['email'] . '"';
				$result3 = $conn->query($sql3);
				if ($result3->num_rows > 0) {
					#do nothing
					$conn->close();
				}
			}


			require('connectdb.ext');

			$sql4 = 'SELECT * FROM `users` WHERE `dpay2` = "' . $rowa['email'] . '"';
			$result4 = $conn->query($sql4);
			if ($result4->num_rows > 0) {
				$rows = $result4->fetch_assoc();
				$conn->close();
				require("connectdb.ext");
				$sql5 = 'UPDATE `users` set `dpay2`= ""  WHERE `email` = "' . $rows['email'] . '"';
				$result5 = $conn->query($sql5);
				if ($result5->num_rows > 0) {
					#do nothing
					$conn->close();
					$counter1 = 1;
				}
			}
		}
	}



	while ($row = $result->fetch_assoc()) {
		$to_time = strtotime("now");
		$from_time = strtotime($row['acctime']);
		$ctime = round(abs($to_time - $from_time) / 60, 0);
		if ((60 - $ctime) < 0) {
			$conn->close();
			require("connectdb.ext");
			$sql1 = 'DELETE FROM `users` WHERE `email` = "' . $row['email'] . '"';
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				$conn->close();

				require('connectdb.ext');

				$sql2 = 'SELECT * FROM `users` WHERE `dpay1` = "' . $row['email'] . '"';
				$result2 = $conn->query($sql2);
				if ($result2->num_rows > 0) {
					$rows = $result2->fetch_assoc();
					$conn->close();
					require("connectdb.ext");
					$sql3 = 'UPDATE `users` set `dpay1`= ""  WHERE `email` = "' . $rows['email'] . '"';
					$result3 = $conn->query($sql3);
					if ($result3->num_rows > 0) {
						#do nothing
						$conn->close();
					}
				}


				require('connectdb.ext');

				$sql4 = 'SELECT * FROM `users` WHERE `dpay2` = "' . $rowa['email'] . '"';
				$result4 = $conn->query($sql4);
				if ($result4->num_rows > 0) {
					$rows = $result4->fetch_assoc();
					$conn->close();
					require("connectdb.ext");
					$sql5 = 'UPDATE `users` set `dpay2`= ""  WHERE `email` = "' . $rows['email'] . '"';
					$result5 = $conn->query($sql5);
					if ($result5->num_rows > 0) {
						#do nothing
						$conn->close();
					}
				}
			}
		}
		$counter1 = $counter1 + 1;
		echo $counter1 . ' accounts deleted.';
	}
} else {
	echo "No dormant account found";
}
?>
<script>
	setTimeout(function() {
		window.location.reload();
	}, 1 * 30 * 1000);
	// just show current time stamp to see time of last refresh.
</script>
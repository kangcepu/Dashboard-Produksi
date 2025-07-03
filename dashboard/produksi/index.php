<!--Sesuai Koneksi Database yang kamu miliki, 
disini saya menggunakan Stored Procedure untuk eksekusi Query yang cukup berat, Silahkan gunakan RestAPI jika cocok untuk struktur database kamu

Created By : Khalid Lubis
Email : khalid@mesproject.id
Website: khalid.mesproject.id
Hubungi saya jika ingin melakukan kerja sama



I use SQL Server Stored Procedures to execute queries that are quite heavy. Please use RestAPI if it suits your database structure.

Created By: Khalid Lubis

Email: khalid@mesproject.id
Website: khalid.mesproject.id
Contact me if you want to collaborate.

Thank you.

!-->

<?php
$serverName = "192.168.1.2";
$connectionOptions = [
    "Database" => "NamaDB",
    "Uid" => "sa",
    "PWD" => "passwordsaya",
    "CharacterSet" => "UTF-8"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "{CALL sp_GetLaporanMultiRip}";
$stmt = sqlsrv_query($conn, $sql);

$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$totalmultirip = $result['TotalAkhirS4S'] ?? '0 M';
$stmt = sqlsrv_query($conn, $sql);


$sqlS4S = "{CALL sp_GetLaporanS4sGrade}";
$stmtS4S = sqlsrv_query($conn, $sqlS4S);
$resultgrade = sqlsrv_fetch_array($stmtS4S, SQLSRV_FETCH_ASSOC);
$totals4sgrade = $resultgrade['TotalAkhirS4S'] ?? '0 M';
$stmtS4S = sqlsrv_query($conn, $sqlS4S);

$sqlS4Sline = "{CALL sp_GetLaporanS4sLine1}";
$stmtS4Sline = sqlsrv_query($conn, $sqlS4Sline);
$results4sline = sqlsrv_fetch_array($stmtS4Sline, SQLSRV_FETCH_ASSOC);
$totals4sline = $results4sline['TotalAkhirS4S'] ?? '0 M';
$stmtS4Sline = sqlsrv_query($conn, $sqlS4Sline);


$sqlfinger1 = "{CALL sp_GetlaporanFingerJoint1}";
$stmtTotal = sqlsrv_query($conn, $sqlfinger1);
$resultfj1 = sqlsrv_fetch_array($stmtTotal, SQLSRV_FETCH_ASSOC);
$totalfj1 = $resultfj1['TotalAkhirS4S'] ?? '0 M';
$stmtfinger1 = sqlsrv_query($conn, $sqlfinger1); 


$sqlfinger2 = "{CALL sp_GetLaporanFingerJoint2}";
$stmtfinger2 = sqlsrv_query($conn, $sqlfinger2);
$resultfj2 = sqlsrv_fetch_array($stmtfinger2, SQLSRV_FETCH_ASSOC);
$totalfj2 = $resultfj2['TotalAkhirS4S'] ?? '0 M';
$stmtfinger2 = sqlsrv_query($conn, $sqlfinger2);


$sqlfinger3 = "{CALL sp_GetLaporanFingerJoint3}";
$stmtfinger3 = sqlsrv_query($conn, $sqlfinger3);
$resultfj3 = sqlsrv_fetch_array($stmtfinger3, SQLSRV_FETCH_ASSOC);
$totalfj3 = $resultfj3['TotalAkhirS4S'] ?? '0 M';
$stmtfinger3 = sqlsrv_query($conn, $sqlfinger3);


$sqlmld1 = "{CALL sp_GetLaporanMld1}";
$stmtmld1 = sqlsrv_query($conn, $sqlmld1);
$resultmld1 = sqlsrv_fetch_array($stmtmld1, SQLSRV_FETCH_ASSOC);
$totalmld1 = $resultmld1['TotalAkhirS4S'] ?? '0 M';
$stmtmld1 = sqlsrv_query($conn, $sqlmld1);



$sqlmld2 = "{CALL sp_GetLaporanMld2}";
$stmtmld2 = sqlsrv_query($conn, $sqlmld2);
if ($stmtmld2 === false) {
    die(print_r(sqlsrv_errors(), true));
}

$rowsmld2 = [];
$totalmld2 = 0;

while ($row = sqlsrv_fetch_array($stmtmld2, SQLSRV_FETCH_ASSOC)) {
    $rowsmld2[] = $row;
    if (isset($row['TotalAkhirS4S']) && is_numeric($row['TotalAkhirS4S'])) {
        $totalmld2 = $row['TotalAkhirS4S']; 
    }
}
$totalmld2 = $rowsmld2[0]['TotalAkhirS4S'] ?? 0;


$sqllmt1 = "{CALL sp_GetLaporanLmt1}";
$stmtlmt1 = sqlsrv_query($conn, $sqllmt1);
if ($stmtlmt1 === false) {
    die(print_r(sqlsrv_errors(), true));
}

$rowslmt1 = [];
$totallmt1 = 0;

while ($row = sqlsrv_fetch_array($stmtlmt1, SQLSRV_FETCH_ASSOC)) {
    $rowslmt1[] = $row;
    if (isset($row['TotalAkhirS4S']) && is_numeric($row['TotalAkhirS4S'])) {
        $totallmt1 = $row['TotalAkhirS4S']; 
    }
}
$totallmt1 = $rowslmt1[0]['TotalAkhirS4S'] ?? 0;


$sqllmt2 = "{CALL sp_GetLaporanLmt2}";
$stmtlmt2 = sqlsrv_query($conn, $sqllmt2);
if ($stmtlmt2 === false) {
    die(print_r(sqlsrv_errors(), true));
}

$rowslmt2 = [];
$totallmt2 = 0;

while ($row = sqlsrv_fetch_array($stmtlmt2, SQLSRV_FETCH_ASSOC)) {
    $rowslmt2[] = $row;
    if (isset($row['TotalAkhirS4S']) && is_numeric($row['TotalAkhirS4S'])) {
        $totallmt2 = $row['TotalAkhirS4S']; 
    }
}
$totallmt2 = $rowslmt2[0]['TotalAkhirS4S'] ?? 0;

$sqlsanding = "{CALL sp_GetLaporanSanding}";
$stmtsanding = sqlsrv_query($conn, $sqlsanding);
if ($stmtsanding === false) {
    die(print_r(sqlsrv_errors(), true));
}

$rowssanding = [];
$totalsanding = 0;

while ($row = sqlsrv_fetch_array($stmtsanding, SQLSRV_FETCH_ASSOC)) {
    $rowssanding[] = $row;
    if (isset($row['TotalAkhirS4S']) && is_numeric($row['TotalAkhirS4S'])) {
        $totalsanding = $row['TotalAkhirS4S']; 
    }
}
$totalsanding = $rowssanding[0]['TotalAkhirS4S'] ?? 0;


$sqlpacking = "{CALL sp_GetLaporanPacking}";
$stmtpacking = sqlsrv_query($conn, $sqlpacking);

if ($stmtpacking === false) {
    die(print_r(sqlsrv_errors(), true));
}

$rowspacking = [];
$totalpacking = 0;

while ($row = sqlsrv_fetch_array($stmtpacking, SQLSRV_FETCH_ASSOC)) {
    $rowspacking[] = $row;
    if (isset($row['TotalAkhirS4S']) && is_numeric($row['TotalAkhirS4S'])) {
        $totalpacking = $row['TotalAkhirS4S']; 
    }
}
$totalpacking = $rowspacking[0]['TotalAkhirS4S'] ?? 0;


$sqloees4s = "{CALL sp_GetLaporanOEE_S4S}";
$stmtoees4s = sqlsrv_query($conn, $sqloees4s);

if ($stmtoees4s === false) {
    die(print_r(sqlsrv_errors(), true));
}


$sqloeefj1 = "{CALL sp_GetOEEFj1}";
$stmtoeefj1 = sqlsrv_query($conn, $sqloeefj1);

if ($stmtoeefj1 === false) {
    die(print_r(sqlsrv_errors(), true));
}


$sqloeefj2 = "{CALL sp_GetOEEFj2}";
$stmtoeefj2 = sqlsrv_query($conn, $sqloeefj2);

if ($stmtoeefj2 === false) {
    die(print_r(sqlsrv_errors(), true));
}


$sqloeefj3 = "{CALL sp_GetOEEFj3}";
$stmtoeefj3 = sqlsrv_query($conn, $sqloeefj3);

if ($stmtoeefj3 === false) {
    die(print_r(sqlsrv_errors(), true));
}


$sqloeemld1 = "{CALL sp_GetOEEMld1}";
$stmtoeemld1 = sqlsrv_query($conn, $sqloeemld1);

if ($stmtoeemld1 === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sqloeemld2 = "{CALL sp_GetOEEMld2}";
$stmtoeemld2 = sqlsrv_query($conn, $sqloeemld2);

if ($stmtoeemld2 === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sqloeesanding = "{CALL sp_GetOEESanding}";
$stmtoeesanding = sqlsrv_query($conn, $sqloeesanding);

if ($stmtoeesanding === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sqloeelmt1 = "{CALL sp_GetOEELmt1}";
$stmtoeelmt1 = sqlsrv_query($conn, $sqloeelmt1);

if ($stmtoeelmt1 === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sqloeelmt2 = "{CALL sp_GetOEELmt2}";
$stmtoeelmt2 = sqlsrv_query($conn, $sqloeelmt2);

if ($stmtoeelmt2 === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>


<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Produksi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-600 h-[1080px] overflow-hidden">
  <div class="max-w-[960px] h-full mx-auto flex flex-col">
    <div class="flex flex-col gap-1 h-full overflow-hidden">
      <div class="flex-1 h-full overflow-hidden">
        <div class="flex items-center mb-2">
          <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white text-white font-bold text-lg mr-2 select-none">1</div>
          <div class="flex-1 bg-yellow-700 rounded px-3 py-2 text-white font-extrabold text-sm select-none">
            <span>DASHBOARD PRODUKSI (OUTPUT)</span>
          </div>
          
        </div>
        <div class="grid grid-cols-3 gap-[2px]">
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
  <span>Multi Rip</span>
  <span><?= $totalmultirip ?><sup></sup></span>
</div>

<?php
if ($stmt !== false) {
    $rows = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $rows[] = $row;
    }

    $jumlahData = count($rows);
    $batas = 5;

    for ($i = 0; $i < $batas; $i++) {
        if ($i < $jumlahData) {
            $bb = htmlspecialchars($rows[$i]['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
            $akhir = htmlspecialchars($rows[$i]['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
        } else {
            $bb = '-';
            $akhir = '-';
        }

        echo '
        <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
            <span>' . $bb . '</span>
            <span>' . $akhir . ' <sup></sup></span>
        </div>';
    }
}
?>
          </div>
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
  <span>FJ 2</span>
  <span><?= $totalfj2 ?><sup></sup></span>
</div>

        <?php
        if ($stmtfinger2 !== false) {
            $rows = [];
            while ($row = sqlsrv_fetch_array($stmtfinger2, SQLSRV_FETCH_ASSOC)) {
                $rows[] = $row;
            }

            $maksimal = 5;
            $jumlahData = count($rows);

            for ($i = 0; $i < $maksimal; $i++) {
                if ($i < $jumlahData) {
                    $bb = htmlspecialchars($rows[$i]['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
                    $akhir = htmlspecialchars($rows[$i]['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
                } else {
                    $bb = '-';
                    $akhir = '-';
                }
                echo '
                <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                    <span>' . $bb . '</span>
                    <span>' . $akhir . ' <sup></sup></span>
                </div>';
            }
        }
        ?>
    </div>

          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
    <span>LMT 1</span>
    <span><?= $totallmt1 ?><sup></sup></span>
</div>
<?php
$totalRows = count($rowslmt1);
$maxRows = 5;

if ($totalRows > 0) {
    foreach ($rowslmt1 as $row) {
        $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
        $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
        echo '
        <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
            <span>' . $bb . '</span>
            <span>' . $akhir . ' <sup>3</sup></span>
        </div>';
    }
}

for ($i = $totalRows; $i < $maxRows; $i++) {
    echo '
    <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
        <span>-</span>
        <span>-</span>
    </div>';
}
?>

          </div>
          <div>
 
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
                <span>S4S Grade</span>
                <span><?= $totals4sgrade ?></span>
            </div>

                <?php
                $rowsS4S = [];
                if ($stmtS4S !== false) {
                    while ($row = sqlsrv_fetch_array($stmtS4S, SQLSRV_FETCH_ASSOC)) {
                        $rowsS4S[] = $row;
                    }
                }

                $maxRows = 5;
                $totalRows = count($rowsS4S);

                foreach (array_slice($rowsS4S, 0, $maxRows) as $row) {
                    $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
                    $akhirRaw = trim($row['AkhirS4S'] ?? '-');

                    $lastSpacePos = strrpos($akhirRaw, ' ');
                    if ($lastSpacePos !== false) {
                        $volume = substr($akhirRaw, 0, $lastSpacePos); 
                        $persen = substr($akhirRaw, $lastSpacePos + 1); 
                        $akhir = htmlspecialchars($volume . ' (' . $persen . ')', ENT_QUOTES, 'UTF-8');
                    } else {
                        $akhir = htmlspecialchars($akhirRaw, ENT_QUOTES, 'UTF-8'); 
                    }

                    echo '
                    <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                        <span>' . $bb . '</span>
                        <span>' . $akhir . '</span>
                    </div>';
                }
                for ($i = $totalRows; $i < $maxRows; $i++) {
                    echo '
                    <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                        <span>-</span>
                        <span>-</span>
                    </div>';
                }
                ?>
            </div>
            <div>
        <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
            <span>FJ 3</span>
            <span><?= $totalfj3 ?></span>
        </div>
        <?php
         if ($stmtfinger3 !== false) {
            $rows = [];
            while ($row = sqlsrv_fetch_array($stmtfinger3, SQLSRV_FETCH_ASSOC)) {
                 $rows[] = $row;
              }
                 $maksimal = 5;
                 $jumlahData = count($rows);

                 for ($i = 0; $i < $maksimal; $i++) {
                    if ($i < $jumlahData) {
                       $bb = htmlspecialchars($rows[$i]['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
                        $akhir = htmlspecialchars($rows[$i]['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
                        } else {
                        $bb = '-';
                        $akhir = '-';
                    }
                echo '
                <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                    <span>' . $bb . '</span>
                    <span>' . $akhir . ' </span>
                </div>';
                }
            }
            ?>
        </div>

<div>
<div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
    <span>LMT 2</span>
    <span><?= $totallmt2 ?></span>
</div>
<?php
$maxRows = 5;
$totalRows = count($rowslmt2);
foreach (array_slice($rowslmt2, 0, $maxRows) as $row) {
    $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
    $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
    echo '
    <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
        <span>' . $bb . '</span>
        <span>' . $akhir . ' </span>
    </div>';
}

for ($i = $totalRows; $i < $maxRows; $i++) {
    echo '
    <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
        <span>-</span>
        <span>-</span>
    </div>';
}
?>
          </div>
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
    <span>S4S Line 2</span>
    <span><?= $totals4sline ?></span>
</div>

<?php
if ($stmtS4Sline !== false) {
    $rows = [];
    while ($row = sqlsrv_fetch_array($stmtS4Sline, SQLSRV_FETCH_ASSOC)) {
        $rows[] = $row;
    }

    $maxRows = 5;
    $totalRows = count($rows);
    foreach (array_slice($rows, 0, $maxRows) as $row) {
        $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
        $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
        echo '
        <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
            <span>' . $bb . '</span>
            <span>' . $akhir . ' </span>
        </div>';
    }
    for ($i = $totalRows; $i < $maxRows; $i++) {
        echo '
        <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
            <span>-</span>
            <span>-</span>
        </div>';
    }
}
?>
          </div>
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
    <span>MLD 1</span>
    <span><?= $totalmld1 ?? '0 M' ?></span>
</div>
<?php
if ($stmtmld1 !== false) {
    $rows = [];
    while ($row = sqlsrv_fetch_array($stmtmld1, SQLSRV_FETCH_ASSOC)) {
        $rows[] = $row;
    }

    $maxRows = 5;
    $totalRows = count($rows);

    foreach (array_slice($rows, 0, $maxRows) as $row) {
        $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
        $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
        echo '
        <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
            <span>' . $bb . '</span>
            <span>' . $akhir . ' </span>
        </div>';
    }
    for ($i = $totalRows; $i < $maxRows; $i++) {
        echo '
        <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
            <span>-</span>
            <span>-</span>
        </div>';
    }
}
?>
          </div>
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
    <span>SND</span>
    <span><?= $totalsanding ?? '0' ?></span>
</div>
<?php
$maxRows = 5;
$totalRows = count($rowssanding);

if ($totalRows > 0) {
    foreach (array_slice($rowssanding, 0, $maxRows) as $row) {
        $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
        $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
        echo '
        <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
            <span>' . $bb . '</span>
            <span>' . $akhir . ' </span>
        </div>';
    }
}
for ($i = $totalRows; $i < $maxRows; $i++) {
    echo '
    <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
        <span>-</span>
        <span>-</span>
    </div>';
}
?>
          </div>
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
                <span>FJ 1</span>
                <span><?= $totalfj1 ?? '0' ?></span>
            </div>
            <?php
            $maxRows = 5;
            $rows = [];

            if ($stmtfinger1 !== false) {
                while ($row = sqlsrv_fetch_array($stmtfinger1, SQLSRV_FETCH_ASSOC)) {
                    $rows[] = $row;
                }
            }
            
            $totalRows = count($rows);

            if ($totalRows > 0) {
                foreach (array_slice($rows, 0, $maxRows) as $row) {
                    $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
                    $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
                    echo '
                    <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                        <span>' . $bb . '</span>
                        <span>' . $akhir . ' </span>
                    </div>';
                }
            }
            for ($i = $totalRows; $i < $maxRows; $i++) {
                echo '
                <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                    <span>-</span>
                    <span>-</span>
                </div>';
            }
            ?>
          </div>
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
                <span>MLD 2</span>
                <span><?= $totalmld2 ?? '0' ?></span>
            </div>

            <?php
            $maxRows = 5;
            $totalRows = count($rowsmld2 ?? []);
            $rowsToShow = array_slice($rowsmld2 ?? [], 0, $maxRows);

            foreach ($rowsToShow as $row) {
                $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
                $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                    <span>' . $bb . '</span>
                    <span>' . $akhir . ' </span>
                </div>';
            }

            for ($i = $totalRows; $i < $maxRows; $i++) {
                echo '
                <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                    <span>-</span>
                    <span>-</span>
                </div>';
            }
            ?>
            </div>
          <div>
            <div class="bg-yellow-700 text-yellow-400 font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between items-center">
                <span>Packing</span>
                <span><?= $totalpacking ?? '0' ?></span>
                </div>

        <?php
        $maxRows = 5;
        $totalRows = count($rowspacking ?? []);
        $rowsToShow = array_slice($rowspacking ?? [], 0, $maxRows);

        foreach ($rowsToShow as $row) {
            $bb = htmlspecialchars($row['BB'] ?? '-', ENT_QUOTES, 'UTF-8');
            $akhir = htmlspecialchars($row['AkhirS4S'] ?? '-', ENT_QUOTES, 'UTF-8');
            echo '
            <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                <span>' . $bb . '</span>
                <span>' . $akhir . ' </span>
            </div>';
        }

            for ($i = $totalRows; $i < $maxRows; $i++) {
                echo '
                <div class="bg-gray-300 text-gray-700 text-xs font-semibold px-2 py-1 flex justify-between border-b border-gray-400">
                    <span>-</span>
                    <span>-</span>
                </div>';
            }
            ?>
          </div>
        </div>
      <div class="flex-1 h-full">
        <div class="flex items-center mb-1">
          <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 border-white text-white font-bold text-lg mr-2 select-none" style="background-color:#6a2dbd">2</div>
          <div class="flex-1 bg-blue-700 rounded px-1 py-1 text-white font-extrabold text-sm select-none">
            <span>DASHBOARD PRODUKSI (OEE)</span>
          </div>
        </div>
        <div class="grid grid-cols-3 gap-1 overflow-y-auto min-h-0 flex-1">
        <div class="flex flex-col space-y-1">
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoees4s, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-1 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">S4S</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>

            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeefj1, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-1 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">FJ 1</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeefj2, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">FJ 2</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
        </div>
        <div class="flex flex-col space-y-1">
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeefj3, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">FJ 3</span>
                    <span class="text-yellow-400 font-semibold text-x ml-2">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeemld1, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-1 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">MLD 1</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeemld2, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-1 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">MLD 2</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
        </div>

        <div class="flex flex-col space-y-1">
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeelmt1, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-1 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">LMT 1</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeelmt2, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-1 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">LMT 2</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
            <div>
            <?php
            while ($row = sqlsrv_fetch_array($stmtoeesanding, SQLSRV_FETCH_ASSOC)) {
                $planning = htmlspecialchars($row['Planning'] ?? '-', ENT_QUOTES, 'UTF-8');
                $availability = htmlspecialchars($row['Availability'] ?? '-', ENT_QUOTES, 'UTF-8');
                $speed = htmlspecialchars($row['Speed'] ?? '-', ENT_QUOTES, 'UTF-8');
                $oee = htmlspecialchars($row['OEE'] ?? '-', ENT_QUOTES, 'UTF-8');
                echo '
                <div class="font-semibold text-sm rounded-t px-2 py-1 select-none flex justify-between" style="background-color:#4a6ed1">
                    <span class="text-white font-semibold text-x">SND</span>
                    <span class="text-yellow-400 font-semibold text-x ml-1">' . $oee . '</span>
                </div>
                <div class="bg-gray-300 rounded-b py-1 px-2 text-x text-gray-700 font-semibold space-y-1">
                    <div class="flex justify-between"><span class="font-bold">Planning</span><span>' . $planning . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Availability</span><span>' . $availability . '</span></div>
                    <div class="flex justify-between"><span class="font-bold">Speed</span><span>' . $speed . '</span></div>
                </div>';
            }
            ?>
            </div>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
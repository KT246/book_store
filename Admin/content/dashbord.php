<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashbord</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

  <?php

  include_once '../con_db.php';


  /// Count User
  $user = 0;
  $sql = "SELECT * FROM tb_user";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll();
  foreach ($data as $res) {
    if ($res['id_user'] > 0) {
      $user++;
    }
  }

  //  Day and Month

  $sql = "SELECT 
          SUM(CASE WHEN DATE(date_create) = CURDATE() THEN total ELSE 0 END) AS totalDay,
          SUM(CASE WHEN MONTH(date_create) = MONTH(CURDATE()) THEN total ELSE 0 END) AS totalMonth
          FROM tb_bill";
          
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetch();

  $Day = number_format($data['totalDay'], 0, ',', ',');
  $Month = number_format($data['totalMonth'], 0, ',', ',');

  //// insert Order
  $order = 0;
  $order_price = 0;
  $sql = "SELECT * FROM tb_bill";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $datas = $stmt->fetchAll();
  foreach ($datas as $res) {
    $order_price += $res['total'];
    if ($res['id_bill'] > 0) {
      $order++;
    }
  }
  $order_price_format = number_format($order_price, 0, ',', ',');

  // insert order Day
  $sql = "SELECT COUNT(id_bill) as  orderDay FROM tb_bill WHERE DATE(date_create) = CURDATE()";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetch();
  $orderDay = $data['orderDay'];

  // insert order Month
  $sql = "SELECT COUNT(id_bill) as  orderMonth FROM tb_bill WHERE MONTH(date_create) = MONTH(CURDATE())";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetch();
  $orderMonth = $data['orderMonth'];

  ?>

  <div class="h-[100vh] ml-[229px] py-3 px-6 bg-gray-200 w-[84vw]">
    <h1 class="text-semibold text-xl leading-8 border-b-2 border-gray-900 py-4">Dashbord</h1>
    <div class="grid grid-cols-7 mt-8">

      <!-- ========Chart js x canvas=========== -->
      <div class="col-span-6 me-8 ">
        <div class="bg-gray-300 h-[70vh] w-full rounded p-2 mt-8 ">
          <h3 class="text-gray-900 font-semibold text-lg text-center mb-5">years</h3>
          <canvas id="chart" style="width:100%; height: 410px;"></canvas>
        </div>
      </div>

      <!-- Card -->
      <div class="col-span-1">
        <div class="grid grid-rows-4 gap-3 place-items-center mt-8 ">
          <div class="bg-gray-300 h-[120px] w-[100%] text-white rounded p-2 ">
            <div class="flex justify-between">
              <h3 class="text-gray-900 font-semibold text-lg">User</h3>
            </div>
            <div>
              <h1 class="font-bold text-2xl text-gray-900  text-center mt-3"><?php echo $user; ?></h1>

            </div>
          </div>


          <div class="bg-gray-300 h-[120px] w-[100%] text-white rounded p-2">
            <h3 class="text-gray-900 font-semibold text-lg">Order</h3>
            <div>
              <h1 class="font-bold text-2xl text-gray-900 text-center mt-1"><?php echo $order; ?></h1>
              <p class="text-center text-sm mt-2 text-gray-500 font-semibold">Giá: <span class="block text-green-500 text-md"><?php echo $order_price_format . ' đ' ?></span></p>
            </div>
          </div>

          <div class="bg-gray-300 h-[120px] w-[100%] text-white rounded p-2">
            <h3 class="text-gray-900 font-semibold text-lg">Day</h3>
            <div>
              <h1 class="font-bold text-2xl text-gray-900 text-center mt-1"><?php echo $Day . ' đ'; ?></h1>
              <p class="text-center text-sm mt-2 text-gray-500 font-semibold">Order: <span class=" block text-green-500 text-md"><?php echo $orderDay; ?></span></p>
            </div>
          </div>

          <div class="bg-gray-300 h-[120px] w-[100%] text-white rounded p-2">
            <h3 class="text-gray-900 font-semibold text-lg">Month</h3>
            <div>
              <h1 class="font-bold text-2xl text-gray-900 text-center mt-1"><?php echo $Month . ' đ'; ?></h1>
              <p class="text-center text-sm mt-2 text-gray-500 font-semibold">Order: <span class="block text-green-500 text-md"><?php echo $orderMonth ?></span></p>
            </div>
          </div>

        </div>
      </div>
      <!-- End of card -->
    </div>
  </div>

  <?php



  /// insert Charts js type 'line'
  $sql = "SELECT DATE_FORMAT(date_create, '%Y-%m') AS month, 
               COALESCE(SUM(total), 0) AS total
        FROM tb_bill 
        GROUP BY YEAR(date_create), MONTH(date_create)
        ORDER BY YEAR(date_create), MONTH(date_create)";

  // Prepare and execute the SQL statement
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // Fetch all results
  $data = $stmt->fetchAll();

  echo '<script>
    const canvas = document.getElementById("chart");
    const ctx = canvas.getContext("2d");

    const sellData = [';

  foreach ($data as $datas) {
    echo '
      {
        month: "' . $datas['month'] . '",
        visitors: ' . $datas["total"] . '
      },';
  }

  echo '
    ];

    const options = {
      type: "line",
      data: {
        labels: sellData.map(data => data.month),
        datasets: [{
          label: "Thu nhập",
          data: sellData.map(data => data.visitors),
          backgroundColor: "rgba(128, 128, 128, 0.5)",
          borderColor: "rgba(128, 128, 128, 1)",
          fill: true,
        }],
      },
      options: {
        title: {
          display: true,
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
            },
          }],
        },
      },
    };

    new Chart(ctx, options);
  </script>';
  ?>



</body>

</html>
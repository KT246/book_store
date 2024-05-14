<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

  <div class="h-[100vh] ml-[229px] py-3 px-6 bg-gray-200 w-[84vw]">
      <h1 class="text-semibold text-xl leading-8 border-b-2 border-gray-900 py-4">Dashbord</h1>
      <div class="flex ">
          <div class="bg-gray-300 h-auto w-[75%] rounded p-2 mt-8">
            <h3 class="text-gray-900 font-semibold text-lg text-center mb-5">Last years</h3>
            <canvas id="myChart" style="width:100%; height: 410px;"></canvas>
          </div>
      
      <!-- Card -->
      <div class="grid grid-rows-4 gap-3 place-items-center mt-4">
          <div class="bg-gray-300 h-[120px] w-full text-white rounded p-2 ">
            <div class="flex justify-between">
              <h3 class="text-gray-900 font-semibold text-lg">User</h3>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
              </svg>
            </div>
            <div>
              <h1 class="font-bold text-2xl text-gray-900  text-center mt-3">55</h1>
            </div>
          </div>
          
          <div class="bg-gray-300 h-[120px] w-full text-white rounded p-2">
            <h3 class="text-gray-900 font-semibold text-lg">Day</h3>
            <div>
              <h1 class="font-bold text-2xl text-gray-900 text-center mt-1">405.121 đ</h1>
              <p class="text-center text-sm mt-2 text-gray-500 font-semibold">Order: <span class="text-green-500 text-md">50</span></p>
            </div>
          </div>
          <div class="bg-gray-300 h-[120px] w-full text-white rounded p-2">
            <h3 class="text-gray-900 font-semibold text-lg">Week</h3>
            <div>
              <h1 class="font-bold text-2xl text-gray-900 text-center mt-1">$455</h1>
              <p class="text-center text-sm mt-2 text-gray-500 font-semibold">Order: <span class="text-green-500 text-md">50</span></p>
            </div>
          </div>
          <div class="bg-gray-300 h-[120px] w-full text-white rounded p-2">
            <h3 class="text-gray-900 font-semibold text-lg">Month</h3>
            <div>
              <h1 class="font-bold text-2xl text-gray-900 text-center mt-1">$455</h1>
              <p class="text-center text-sm mt-2 text-gray-500 font-semibold">Order: <span class="text-green-500 text-md">50</span></p>
            </div>
          </div>

        </div>
        <!-- End of card -->  
    </div>
  </div>



  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
  </script>

  <script>
      const xValues = [];
        const yValues = [];
      const dayValues = [12224,44554,454545,4545,5454,4545,45455,44544,545545];
      const monthValues = [46455,45455,646,546545,4654654,654564,66454,5665,54478,2312,455666, 332778];
      const yearValues = [];
      generateData("x * 100000", 0, 12);

      new Chart("myChart", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [
            {
            data:monthValues ,
            borderColor: "green",
            fill: false
          },
            {
            data: dayValues,
            borderColor: "blue",
            fill: false
          },
        ]
        },
        options: {
          legend: {display: false}
        }
      });

      function generateData(values, i, n){
        for(let x = i; x <= n; x++){
          yValues.push(eval(values));
          xValues.push(x);
        }
      }
  </script>
</body>
</html>
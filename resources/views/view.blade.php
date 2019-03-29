<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   <title>Show Loans</title>
</head>

<body>
   <div class="container">
      <p class="h1">Loan Details</p>
      <div class="row">
         <div class="col-2 align-self-start">
            ID:
         </div>
         <div class="col-2 align-self-start">
            {{$loan->id}}
         </div>
      </div>
      <div class="row">
         <div class="col-2 align-self-start">
            Loan Amount:
         </div>
         <div class="col-2 align-self-start">
            {{$loan->LoanAmount}}
         </div>
      </div>
      <div class="row">
         <div class="col-2 align-self-start">
            Loan Term:
         </div>
         <div class="col-2 align-self-start">
            {{$loan->LoanTerm}}
         </div>
      </div>
      <div class="row">
         <div class="col-2 align-self-start">
            Interest Rate
         </div>
         <div class="col-2 align-self-start">
            {{$loan->InterestRate}}
         </div>
      </div>
      <div class="row">
         <div class="col-2 align-self-start">
            Created at:
         </div>
         <div class="col-2 align-self-start">
            {{$loan->created_at}}
         </div>
      </div>
      <button type="button" onclick="location.href='/'" class="btn btn-secondary">Back</button>
   <p class="h1">Repayment Schedules</p>
   <table class="table">

      <thead>
         <tr>
            <th scope="col">Payment No</th>
            <th scope="col">Date</th>
            <th scope="col">Payment Amount</th>
            <th scope="col">Principal</th>
            <th scope="col">Interest</th>
            <th scope="col">Balance</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($repayments as $repayment)

         <tr>
            <th scope="row">{{$repayment -> no}}</th>
            <td>{{date("M Y", strtotime($repayment -> dates))}}</td>
            <td>{{$repayment -> paymentAmount}}</td>
            <td>{{$repayment -> principal}}</td>
            <td>{{$repayment -> interest}}</td>
            <td>{{$repayment -> balance}}</td>
         </tr>
         @endforeach

      </tbody>
   </table>

   </div>


   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
   </script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
   </script>
</body>

</html>
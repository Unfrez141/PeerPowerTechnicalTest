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
      <p class="h1">Edit Loan</p>
      <div class="row justify-content-md-center">
         <div class="col-10">
            <form action="/update/{{$id}}" method="get" id='form'>
               <div class="form-group">

                     <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Loan Amount:</label>
                        <div class="col-sm-9 input-group mb-3">
                           <input type="text" class="form-control" name="loanAmount"  placeholder="Recipient's username"
                              aria-label="Recipient's username" aria-describedby="basic-addon2">
                           <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">฿</span>
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Loan Term:</label>
                        <div class="col-sm-9 input-group mb-3">
                           <input type="text" class="form-control" name="loanTerm" placeholder="Recipient's username"
                              aria-label="Recipient's username" aria-describedby="basic-addon2">
                           <div class="input-group-append">
                              <span class="input-group-text"  id="basic-addon2">Years</span>
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Investing Rate:</label>
                        <div class="col-sm-9 input-group mb-3">
                           <input type="text" class="form-control"  name="interestRate" placeholder="Recipient's username"
                              aria-label="Recipient's username" aria-describedby="basic-addon2">
                           <div class="input-group-append">
                              <span class="input-group-text"" id="basic-addon2">%</span>
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Start Date:</label>
                        <div class="col-sm-9 input-group mb-3">
                           <div class="dropdown">
                              <select name="month">

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 <option value='01' >Jan</option>
                                 <option value='02' >Feb</option>
                                 <option value='03' >Mar</option>
                                 <option value='04' >Apr</option>
                                 <option value='05' >May</option>
                                 <option value='06' >Jun</option>
                                 <option value='07' >Jul</option>
                                 <option value='08' >Aug</option>
                                 <option value='09' >Sep</option>
                                 <option value='10' >Oct</option>
                                 <option value='11' >Nov</option>
                                 <option value='12' >Dec</option>
                              </div>
                              </select>

                           </div>

                           <div class="dropdown">
                              <select name="year">
                              <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                                 @for ($i = 2017; $i < 2051; $i++)
                                    <option value={{$i}} >{{$i}}</option>
                                 @endfor
                              </div>
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                           <button type="submit" class="btn btn-primary">Edit</button>
                           <button type="button" onclick="location.href='/'" class="btn btn-secondary">Back</button>
                        </div>
                     </div>

            </form>
         </div>
      </div>

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
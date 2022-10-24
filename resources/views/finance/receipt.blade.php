@isset($payments)

@isset($settings)

@if (count($payments)>0 && count($settings)>0)

@foreach ($payments as $payment )

@foreach ($settings as $setting )

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School-Receipt</title>
  <!-- Tell tde browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">

  :root{
    --primary:green;
    font-size: 11pt;
  }


		@page { size: 8.27in 11.69in; margin: 0.80in;margin-right: 1.1in }

    h1,h2,h3,h4,h5{
      padding: 0px;
      margin: 0px;

    }

		td p { background: transparent }
		a:link { color: #000080; so-language: zxx; text-decoration: underline }
		a:visited { color: #800000; so-language: zxx; text-decoration: underline }


	</style>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body style="font-family:Arial, Helvetica, sans-serif;width:100vw;display: flex;justify-content:center;" align="center">
<div class="wrapper">
    <section class="content" >
      <div class="container-fluid" >
        <div class="row justify-content-center" style="display: flex;justify-content:center; ">
          <div class="col-8 p-2"   style="background-color:white;width: 100%;padding:1%;margin:1%;border:2px dotted black">
            <!-- Main content -->
            <div class="invoice p-3 mb-3" >
              <!-- title row -->
             

              <center align="center">
                <div class="row" style="display: grid;place-items:center;">
                  <div class="col-12" style="width: 100%;display:flex;justify-items:center;flex-direction:column;align-items:center" >
                   <center>
                    <div style="display:grid;place-items:center">
  
                    
                    <h3 style="text-align: center"><img src="../storage/app/public/img/{{$setting->school_badge}}" alt="No Image"  style="height: 120px;width:120px;border:2px solid ;border-radius:50%"></h3>
  
                    </div>
                   </center>
                   <h3 style="text-align: center">{{$setting->school_name}}</h3>
                   <small>
                    <p>Located {{$setting->school_address}} contact us on ({{$setting->school_contact}})</p>
                   </small>
                   <h4 style="text-align: center">Busar's Office</h4>
                   <br>
                   <br>


  

  
                   <center style="width: 100%;min-height:20px;background-color:rgb(67, 178, 67);color:white;padding-bottom:.2%;padding-top:.2%">
                    <p  style="text-align: center;">PAYMENT RECEIPT</p>
                   </center>
                   
                  </div>
                  <!-- /.col -->
                </div>
              </center>
             
              <!-- info row -->
              
              <!-- /.row -->

              <p class="row invoice-info" style="margin-right:5px;padding-left:1%;padding-right:2%;padding-top:1%;padding-bottom:1%;display: flex;justify-content:space-between;width:100%;">
                
                
                <!-- /.col -->
                
                <!-- /.col -->
              </p>
              

              <table style="width: 100%;">

               <tr>
                  <td align="right">
                    <div class="col-sm-4 invoice-col" style="width: 210px">
                      <p style="text-align: left">
                        <b style="color:brown" >Receipt Number #{{$payment->payment_id}}</b><br>
                      </p>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
              </table>
            
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped"   style="font-style:; padding:1%;width: 100%;border:2px dotted rgb(137, 127, 127)">
                  

                    <tr>
                      <td style="font-weight:bold">Payment From</td>
                      <td></td>
                      <td style="color: var(--primary)">{{$payment->student_full_name}}</td>
                    </tr>


                    <tr>
                      <td style="font-weight:bold">Payment For</td>
                      <td></td>
                      <td  style="color: var(--primary)">{{$payment->fees_name}}</td>
                    </tr>


                    

                    <tr>
                      <td style="font-weight:bold">Amount Paid</td>
                      <td></td>
                      <td  style="color: var(--primary)">UGX{{$payment->paid_amount}}</td>
                    </tr>

                    <tr>
                      <td style="font-weight:bold">Balance</td>
                      <td></td>
                      <td  style="color: var(--primary)">UGX{{$payment->fees_amount-$payment->paid_amount}}</td>
                    </tr>


                    <tr>
                      <td style="font-weight:bold">Payment Date</td>
                      <td></td>
                      <td  style="color: var(--primary)">{{date("d/m/Y",strtotime($payment->payment_date))}}</td>
                    </tr>

                    <tr>
                      <td style="font-weight:bold">Payment Mode</td>
                      <td></td>
                      <td  style="color: var(--primary)">Cash</td>
                    </tr>
                    
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                 
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  
                    This is to certify that <strong>{{$payment->student_full_name}}</strong> has made the above payment and has been approved by the  <strong>School Administration</strong> .
                  
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">

                    <h5>Payment Approved By </h5>
                    <p><img src="" alt="Signature" style="height: 40px;max-width:80px" ></p>
                    <p>----------------------------------------------------------------</p>

                    <p> <strong>James Bond</strong></p>
                    <p> School Bursar</p>
                    <h5 class="lead">Date:{{date("d/m/Y",strtotime($payment->payment_date))}}</h5>
                    <hr style="height: .4px">
                    <p style="text-align: center;color:green"><small>Incase of inquiry about this payment contact <strong>({{$setting->school_contact}})</strong> for more information.</small></p>

                    <blockquote>   <h3 style="text-align: center;color:var(--primary)">"{{$setting->school_motto}}"</h3></blockquote>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- tdis row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  window.print();
</script>
</body>
</html>

@endforeach
@endforeach
@else

<h1>
  Payment Receipt Not Available
</h1>

@endif

@endisset

@endisset

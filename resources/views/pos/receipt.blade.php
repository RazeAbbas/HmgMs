<!--
    
    Follow me on
    Dribbble: https://dribbble.com/supahfunk
    Twitter: https://twitter.com/supahfunk
    Codepen: https://codepen.io/supah/
    
-->
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Order confirmation </title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    body { margin: 0; padding: 0; background: #e1e1e1; }
    div, p, a, li, td { -webkit-text-size-adjust: none; }
    .ReadMsgBody { width: 100%; background-color: #ffffff; }
    .ExternalClass { width: 100%; background-color: #ffffff; }
    body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
    html { width: 100%; }
    p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
    .visibleMobile { display: none; }
    .hiddenMobile { display: block; }
    
    @media only screen and (max-width: 600px) {
        body { width: auto !important; }
        table[class=fullTable] { width: 96% !important; clear: both; }
        table[class=fullPadding] { width: 85% !important; clear: both; }
        table[class=col] { width: 45% !important; }
        .erase { display: none; }
    }
    
    @media only screen and (max-width: 420px) {
        table[class=fullTable] { width: 100% !important; clear: both; }
        table[class=fullPadding] { width: 85% !important; clear: both; }
        table[class=col] { width: 100% !important; clear: both; }
        table[class=col] td { text-align: left !important; }
        .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
        .visibleMobile { display: block !important; }
        .hiddenMobile { display: none !important; }
    }
    @media print {
        #printPageButton, #posButton {
            display: none;
        }
    }
</style>

<body>
    <!-- Header -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
                    <tr class="hiddenMobile">
                        <td height="40"></td>
                    </tr>
                    <tr class="visibleMobile">
                        <td height="30"></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                                <tbody>
                                                    <tr>
                                                        <td align="left"> <img src="{{asset('assets/images/Hmg.png')}}" width="100" height="100" alt="logo" border="0" /></td>
                                                    </tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="40"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                            Hello, {{$data['name']}}.
                                                            <br> Thank you for getting service from HMG by Salman.<br>
                                                            <strong>Stylist:</strong>{{$data['emp']['first_name']}} {{$data['emp']['last_name']}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                                <tbody>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 21px; color: #ff0000; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                                                            Invoice
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <tr class="hiddenMobile">
                                                            <td height="50"></td>
                                                        </tr>
                                                        <tr class="visibleMobile">
                                                            <td height="20"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                                <small>ORDER</small> <br />
                                                                <small>{{date('D-M-Y')}}</small>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!-- /Header -->
        <!-- Order Details -->
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
            <tbody>
                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                            <tbody>
                                <tr>
                                    <tr class="hiddenMobile">
                                        <td height="60"></td>
                                    </tr>
                                    <tr class="visibleMobile">
                                        <td height="40"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                                <tbody>
                                                    <tr>
                                                        <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
                                                            Item
                                                        </th>
                                                        {{-- <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
                                                            <small>SKU</small>
                                                        </th> --}}
                                                        <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                                                            Quantity
                                                        </th>
                                                        <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                                                            Subtotal
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" style="background: #bebebe;" colspan="4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10" colspan="4"></td>
                                                    </tr>
                                                    @for ($i=0; $i<count($data['item']); $i++)
                                                    <tr>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                                                            {{$data['item'][$i]}}
                                                        </td>
                                                        {{-- <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>MH792AM/A</small></td> --}}
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">{{$data['qty'][$i]}}</td>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">Rs{{$data['total'][$i]}}</td>
                                                    </tr>
                                                    @endfor
                                                    <tr>
                                                        <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- /Order Details -->
            <!-- Total -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                                <tbody>
                                    <tr>
                                        <td>
                                            
                                            <!-- Table Total -->
                                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                                <tbody>
                                                    <tr>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                            <strong>Subtotal</strong>
                                                        </td>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                                                            Rs. {{$data['total_bill']}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                            <strong>Discount</strong>
                                                        </td>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                            Rs. {{$data['discount'] ?? 0}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                            <strong>Grand Total (Incl.Tax)</strong>
                                                        </td>
                                                        <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                            <strong>Rs. {{$data['payable_amount']}}</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- /Table Total -->
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- /Total -->
            <!-- Information -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                                <tbody>
                                    <tr>
                                        <tr class="hiddenMobile">
                                            <td height="60"></td>
                                        </tr>
                                        <tr class="visibleMobile">
                                            <td height="40"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                                                    
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; ">
                                                                                <strong>BILLING INFORMATION</strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="100%" height="10"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                                
                                                                            New Satellite Town <br> Sargodha<br> 40100, Pakistan<br> Ph: +92 314 1455003
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <button class="btn btn-danger" onclick="window.print()" id="printPageButton">Print Invoice</button>
                                                                <a href="{{ url('/dashboard/pos') }}" class="btn btn-primary" id="posButton">Go To Point of Sale</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr class="hiddenMobile">
                                            <td height="60"></td>
                                        </tr>
                                        <tr class="visibleMobile">
                                            <td height="30"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            
            </html>
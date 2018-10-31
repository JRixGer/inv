
Hello <i>{{ $sendmail->receiver }}</i>,
<p>This is a demo email for testing purposes! Also, its the HTML version.</p>
 
<p><u>Demo object values:</u></p>
 
<div>
<p><b>Demo One:</b>&nbsp;{{ $sendmail->demo_one }}</p>
<p><b>Demo Two:</b>&nbsp;{{ $sendmail->demo_two }}</p>
</div>
 
<p><u>Values passed by With method:</u></p>
 
<div>
<p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
<p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>
 
Thank You,
<br/>
<i>{{ $sendmail->sender }}</i>


<div>


<table class="table" border="1">
  <thead>
    <tr>
      <th scope="col" colspan="16">Hello Sir,</th>
    </tr>
    <tr>
      <th scope="col" colspan="16">Inventory Details</th>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">receipt</th>
      <th scope="col">Email</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">OrderDate</th>
      <th scope="col">SKU</th>
      <th scope="col">QTY</th>
      <th scope="col">ShipToName</th>
      <th scope="col">ShipToAddress1</th>
      <th scope="col">ShipToAddress2</th>
      <th scope="col">ShipToCity</th>
      <th scope="col">ShipToState</th>
      <th scope="col">ShipToZip</th>
      <th scope="col">ShipToCountry</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>here</td>
      <td>here</td>
      <td>here</td>
      <td>Otto</td>
      <td>mdo</td>
      <td>Otto</td>
      <td>mdo</td>
      <td>Otto</td>
      <td>mdo</td>
      <td>Otto</td>
      <td>mdo</td>
      <td>Otto</td>
      <td>mdo</td>
      <td>Otto</td>
      <td>mdo</td>
    </tr>
    <tr>
      <th scope="col" colspan="16">Thank you</th>
    </tr>
  </tbody>
</table>

</div>